<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use Midtrans\Config;
use Midtrans\Transaction;

class FixPendingSubscriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscriptions:fix-pending';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check and fix pending subscriptions that are already settled in Midtrans';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Set Midtrans config
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production', false);
        Config::$isSanitized = config('midtrans.is_sanitized', true);
        Config::$is3ds = config('midtrans.is_3ds', true);

        $this->info('Checking pending subscriptions...');

        // Get all pending subscriptions
        $pendingSubscriptions = Subscription::where('status', 'pending')
            ->whereNotNull('order_id')
            ->get();

        if ($pendingSubscriptions->isEmpty()) {
            $this->info('No pending subscriptions found.');
            return 0;
        }

        $this->info("Found {$pendingSubscriptions->count()} pending subscription(s).");

        $fixed = 0;
        $failed = 0;

        foreach ($pendingSubscriptions as $subscription) {
            try {
                $this->line("Checking order_id: {$subscription->order_id}...");

                $status = Transaction::status($subscription->order_id);

                if ($status->transaction_status === 'settlement' || $status->transaction_status === 'capture') {
                    // Activate subscription
                    $subscription->status = 'active';
                    $subscription->start_date = now()->toDateString();

                    if (str_contains($subscription->package_type, 'weekly')) {
                        $subscription->end_date = now()->addWeek()->toDateString();
                    } else {
                        $subscription->end_date = now()->addMonth()->toDateString();
                    }

                    if (isset($status->transaction_id)) {
                        $subscription->midtrans_transaction_id = $status->transaction_id;
                    }

                    $subscription->save();

                    // Update user premium status
                    $user = $subscription->user;
                    if ($user) {
                        $user->is_premium = true;
                        $user->save();
                        $this->info("✓ Activated subscription for user: {$user->email}");
                    }

                    $fixed++;
                } elseif (in_array($status->transaction_status, ['deny', 'expire', 'cancel'])) {
                    $subscription->status = 'failed';
                    $subscription->save();
                    $this->warn("✗ Marked as failed: {$subscription->order_id}");
                } else {
                    $this->line("  Still pending: {$status->transaction_status}");
                }

            } catch (\Exception $e) {
                $this->error("Error checking {$subscription->order_id}: " . $e->getMessage());
                $failed++;
            }
        }

        $this->info("\nSummary:");
        $this->info("Fixed: {$fixed}");
        $this->info("Failed: {$failed}");

        return 0;
    }
}
