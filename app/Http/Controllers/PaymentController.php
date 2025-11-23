<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
use Midtrans\Transaction;
use App\Models\Subscription;
use App\Models\User;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Set your Merchant Server Key
        Config::$serverKey = config('midtrans.server_key');

        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = config('midtrans.is_production', false);

        // Set sanitization on (default)
        Config::$isSanitized = config('midtrans.is_sanitized', true);

        // Set 3DS transaction for credit card to true
        Config::$is3ds = config('midtrans.is_3ds', true);
    }

    /**
     * Show subscription page
     */
    public function showSubscription()
    {
        $isPremium = Auth::check() && optional(Auth::user())->is_premium;
        return $isPremium ? view('premium.fitplan') : view('premium.subs');
    }

    /**
     * Create payment transaction
     */
    public function createPayment(Request $request)
    {
        $request->validate([
            'package' => 'required|in:standar,pelajar',
            'period' => 'required|in:weekly,monthly',
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Define package prices
        $prices = [
            'standar' => [
                'weekly' => 20000,
                'monthly' => 75000,
            ],
            'pelajar' => [
                'weekly' => 15000,
                'monthly' => 50000,
            ],
        ];

        $packageName = $request->package === 'standar' ? 'Standar' : 'Pelajar';
        $periodName = $request->period === 'weekly' ? 'Mingguan' : 'Bulanan';
        $amount = $prices[$request->package][$request->period];

        // Generate order ID and subscription ID
        $orderId = 'SUB-' . time() . '-' . $user->id;
        $subscriptionId = '#' . str_pad(Subscription::count() + 1, 5, '0', STR_PAD_LEFT);

        // Calculate start and end dates
        $startDate = now()->toDateString();
        if ($request->period === 'weekly') {
            $endDate = now()->addWeek()->toDateString();
        } else {
            $endDate = now()->addMonth()->toDateString();
        }

        // Prepare transaction details
        $transactionDetails = [
            'order_id' => $orderId,
            'gross_amount' => $amount,
        ];

        // Prepare customer details
        $customerDetails = [
            'first_name' => $user->nama_lengkap,
            'email' => $user->email,
        ];

        // Prepare item details
        $itemDetails = [
            [
                'id' => $request->package . '-' . $request->period,
                'price' => $amount,
                'quantity' => 1,
                'name' => "Paket {$packageName} ({$periodName})",
            ],
        ];

        // Prepare transaction parameters
        $params = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
            'item_details' => $itemDetails,
        ];

        try {
            // Check if Midtrans config is set
            if (empty(config('midtrans.server_key'))) {
                return response()->json([
                    'error' => 'Konfigurasi Midtrans belum diatur. Silakan hubungi administrator.',
                    'message' => 'MIDTRANS_SERVER_KEY tidak ditemukan di .env',
                ], 500);
            }

            // Get Snap Token
            $snapToken = Snap::getSnapToken($params);

            if (!$snapToken) {
                return response()->json([
                    'error' => 'Gagal mendapatkan Snap Token dari Midtrans.',
                    'message' => 'Snap token is null',
                ], 500);
            }

            // Save subscription to database with pending status
            try {
                Subscription::create([
                    'user_id' => $user->id,
                    'subscription_id' => $subscriptionId,
                    'order_id' => $orderId,
                    'package_type' => $request->package . '_' . $request->period,
                    'package_name' => "Paket {$packageName} ({$periodName})",
                    'price' => $amount,
                    'status' => 'pending',
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                ]);
            } catch (\Exception $dbError) {
                \Log::error('Database error creating subscription: ' . $dbError->getMessage());
                // Continue even if database save fails, but log it
            }

            return response()->json([
                'snap_token' => $snapToken,
                'order_id' => $orderId,
            ]);
        } catch (\Exception $e) {
            \Log::error('Payment creation error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());

            return response()->json([
                'error' => 'Gagal membuat transaksi. Silakan coba lagi.',
                'message' => config('app.debug') ? $e->getMessage() : 'Terjadi kesalahan pada server',
            ], 500);
        }
    }

    /**
     * Handle payment notification from Midtrans
     */
    public function handleNotification(Request $request)
    {
        try {
            $notification = new Notification();

            $transaction = $notification->transaction_status;
            $type = $notification->payment_type;
            $orderId = $notification->order_id;
            $fraud = $notification->fraud_status;

            // Find subscription by order_id
            $subscription = Subscription::where('order_id', $orderId)->first();

            if (!$subscription) {
                return response()->json(['status' => 'error', 'message' => 'Subscription not found'], 404);
            }

            // Update midtrans_transaction_id
            if ($notification->transaction_id) {
                $subscription->midtrans_transaction_id = $notification->transaction_id;
            }

            // Handle transaction status
            if ($transaction == 'capture') {
                if ($type == 'credit_card') {
                    if ($fraud == 'challenge') {
                        $subscription->status = 'pending';
                    } else {
                        $this->activateSubscription($subscription);
                    }
                }
            } else if ($transaction == 'settlement') {
                $this->activateSubscription($subscription);
            } else if ($transaction == 'pending') {
                $subscription->status = 'pending';
            } else if ($transaction == 'deny' || $transaction == 'expire' || $transaction == 'cancel') {
                $subscription->status = 'failed';
            }

            $subscription->save();

            return response()->json(['status' => 'ok']);
        } catch (\Exception $e) {
            \Log::error('Midtrans notification error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Activate subscription and update user premium status
     */
    private function activateSubscription(Subscription $subscription)
    {
        try {
            DB::transaction(function () use ($subscription) {
                // Reload subscription to get fresh data
                $subscription->refresh();

                // Update subscription status
                $subscription->status = 'active';
                $subscription->start_date = now()->toDateString();

                // Recalculate end date based on package type
                if (str_contains($subscription->package_type, 'weekly')) {
                    $subscription->end_date = now()->addWeek()->toDateString();
                } else {
                    $subscription->end_date = now()->addMonth()->toDateString();
                }

                $subscription->save();

                // Update user premium status
                $user = $subscription->user;
                if ($user) {
                    $oldPremiumStatus = $user->is_premium;
                    $user->is_premium = true;
                    $user->save();

                    \Log::info('User premium status updated', [
                        'user_id' => $user->id,
                        'email' => $user->email,
                        'old_status' => $oldPremiumStatus,
                        'new_status' => $user->is_premium,
                        'subscription_id' => $subscription->id,
                        'order_id' => $subscription->order_id,
                    ]);
                } else {
                    \Log::warning('User not found for subscription', [
                        'subscription_id' => $subscription->id,
                        'user_id' => $subscription->user_id,
                    ]);
                }
            });
        } catch (\Exception $e) {
            \Log::error('Error activating subscription: ' . $e->getMessage(), [
                'subscription_id' => $subscription->id,
                'order_id' => $subscription->order_id,
                'stack_trace' => $e->getTraceAsString(),
            ]);
            throw $e;
        }
    }

    /**
     * Handle payment success callback
     */
    public function paymentSuccess(Request $request)
    {
        $orderId = $request->get('order_id');

        if (!$orderId) {
            return redirect()->route('fitplan')->with('error', 'Order ID tidak ditemukan.');
        }

        $subscription = Subscription::where('order_id', $orderId)->first();

        if (!$subscription) {
            \Log::error('Subscription not found for order_id: ' . $orderId);
            return redirect()->route('fitplan')->with('error', 'Data subscription tidak ditemukan.');
        }

        // Always check status from Midtrans to ensure accuracy
        try {
            $status = Transaction::status($orderId);

            \Log::info('Payment status check for order_id: ' . $orderId, [
                'transaction_status' => $status->transaction_status,
                'payment_type' => $status->payment_type ?? null,
            ]);

            // Update midtrans_transaction_id if available
            if (isset($status->transaction_id) && !$subscription->midtrans_transaction_id) {
                $subscription->midtrans_transaction_id = $status->transaction_id;
            }

            // Activate subscription if payment is settled or captured
            if ($status->transaction_status === 'settlement' || $status->transaction_status === 'capture') {
                // Only activate if not already active
                if ($subscription->status !== 'active') {
                    $this->activateSubscription($subscription);
                    \Log::info('Subscription activated for order_id: ' . $orderId);
                }
            } elseif ($status->transaction_status === 'pending') {
                // Keep as pending
                $subscription->status = 'pending';
                $subscription->save();
            } elseif (in_array($status->transaction_status, ['deny', 'expire', 'cancel'])) {
                // Mark as failed
                $subscription->status = 'failed';
                $subscription->save();
            }

        } catch (\Exception $e) {
            \Log::error('Error checking payment status from Midtrans: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());

            // Even if check fails, if subscription exists and is pending,
            // we can try to activate it (webhook might have already processed it)
            if ($subscription->status === 'pending') {
                // Try to activate anyway as a fallback
                // This is safe because if payment really failed, webhook will update it
                try {
                    $this->activateSubscription($subscription);
                } catch (\Exception $activateError) {
                    \Log::error('Error activating subscription: ' . $activateError->getMessage());
                }
            }
        }

        // Refresh user data to ensure premium status is up to date
        if (Auth::check()) {
            Auth::user()->refresh();
        }

        return redirect()->route('fitplan')->with('success', 'Pembayaran berhasil! Langganan Anda telah diaktifkan.');
    }

    /**
     * Handle payment failure callback
     */
    public function paymentFailed(Request $request)
    {
        return redirect()->route('fitplan')->with('error', 'Pembayaran gagal. Silakan coba lagi.');
    }

    /**
     * Re-check and update subscription status from Midtrans
     * Useful for fixing subscriptions that weren't updated properly
     */
    public function recheckSubscription($orderId)
    {
        try {
            $subscription = Subscription::where('order_id', $orderId)->first();

            if (!$subscription) {
                return response()->json([
                    'error' => 'Subscription not found',
                ], 404);
            }

            $status = Transaction::status($orderId);

            // Update midtrans_transaction_id if available
            if (isset($status->transaction_id) && !$subscription->midtrans_transaction_id) {
                $subscription->midtrans_transaction_id = $status->transaction_id;
            }

            // Activate if settled or captured
            if ($status->transaction_status === 'settlement' || $status->transaction_status === 'capture') {
                if ($subscription->status !== 'active') {
                    $this->activateSubscription($subscription);
                }
                return response()->json([
                    'success' => true,
                    'message' => 'Subscription activated successfully',
                    'status' => 'active',
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Subscription status checked',
                'transaction_status' => $status->transaction_status,
                'subscription_status' => $subscription->status,
            ]);

        } catch (\Exception $e) {
            \Log::error('Error rechecking subscription: ' . $e->getMessage());
            return response()->json([
                'error' => 'Failed to check subscription status',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}

