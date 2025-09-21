<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\User;

class AuthController extends Controller
{
    // ======================
    // TAMPILAN FORM
    // ======================
    public function showLogin(Request $request)
    {
        return view('user.login');
    }

    public function showRegister()
    {
        return view('user.register');
    }

    // ======================
    // PROSES REGISTER
    // ======================
    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email',
            'password'     => 'required|min:6|confirmed',
        ]);

        // Determine premium status based on email or random
        $isPremium = false;
        if ($request->email === 'jonathanarya79@gmail.com') {
            $isPremium = true;
        } elseif ($request->email === 'goldi@gmail.com') {
            $isPremium = false;
        } else {
            // Random premium status for other users
            $isPremium = rand(0, 1) == 1;
        }

        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'role'         => 'user', // default user
            'is_premium'   => $isPremium,
        ]);

        // Setelah register langsung arahkan ke login
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // ======================
    // PROSES LOGIN
    // ======================
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Cek role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            // Tentukan redirect dinamis berdasarkan asal
            $redirect = $request->input('redirect_to');
            $allowed = ['/', '/home'];
            if ($redirect && in_array($redirect, $allowed, true)) {
                return redirect()->to($redirect)->with('success', 'Login berhasil!');
            }

            return redirect()->route('home')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // ======================
    // LOGOUT
    // ======================
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $redirect = $request->input('redirect_to');
        $allowed = ['/', '/home'];
        if ($redirect && in_array($redirect, $allowed, true)) {
            return redirect()->to($redirect)->with('success', 'Anda berhasil logout.');
        }
        return redirect()->route('home')->with('success', 'Anda berhasil logout.');
    }

    // ======================
    // FORGOT PASSWORD
    // ======================
    public function showForgotPassword()
    {
        return view('user.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.exists' => 'Email tidak terdaftar.',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => 'Kami telah mengirimkan link reset password ke email Anda.'])
            : back()->withErrors(['email' => 'Terjadi kesalahan saat mengirim email.']);
    }

    public function showResetPassword(Request $request, $token)
    {
        return view('user.reset-password', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ], [
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', 'Password berhasil direset! Silakan login dengan password baru.')
            : back()->withErrors(['email' => [__($status)]]);
    }

    // ======================
    // RESET PASSWORD DENGAN KODE VERIFIKASI (AMAN)
    // ======================
    public function sendVerificationCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.exists' => 'Email tidak terdaftar.',
        ]);

        // Generate kode verifikasi 6 digit
        $verificationCode = str_pad(random_int(100000, 999999), 6, '0', STR_PAD_LEFT);

        // Simpan kode di database sementara (gunakan tabel password_reset_tokens)
        \DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $verificationCode,
                'created_at' => now()
            ]
        );

        return redirect()->route('password.verify-code')->with([
            'verification_code' => $verificationCode,
            'reset_email' => $request->email,
            'success' => 'Kode verifikasi telah dikirim!'
        ]);
    }

    public function showVerifyCode()
    {
        return view('user.verify-code');
    }

    public function verifyCodeAndReset(Request $request)
    {
        $request->validate([
            'verification_code' => 'required|string|size:6',
            'password' => 'required|min:6|confirmed',
        ], [
            'verification_code.required' => 'Kode verifikasi harus diisi.',
            'verification_code.size' => 'Kode verifikasi harus 6 digit.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // Cek kode verifikasi dari database
        $resetToken = \DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->verification_code)
            ->where('created_at', '>', now()->subMinutes(10)) // 10 menit
            ->first();

        if (!$resetToken) {
            return back()->withErrors(['verification_code' => 'Kode verifikasi salah atau sudah expired.']);
        }

        // Reset password
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();

            // Hapus kode verifikasi dari database
            \DB::table('password_reset_tokens')->where('email', $request->email)->delete();

            return redirect()->route('login')->with('success', 'Password berhasil direset! Silakan login dengan password baru.');
        }

        return back()->withErrors(['error' => 'User tidak ditemukan.']);
    }
}
