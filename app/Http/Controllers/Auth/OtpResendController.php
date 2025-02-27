<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OTP;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class OtpResendController extends Controller
{
    public function resend()
    {
        // Ambil email dari session
        $email = Session::get('register_email');

        if (!$email) {
            return redirect()->back()->with('error', 'Email tidak ditemukan dalam sesi.');
        }

        // Ambil user berdasarkan email
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }

        // Ambil waktu terakhir pengiriman OTP dari session
        $lastSentTime = session('last_otp_sent_time');

        // Cek apakah sudah 1 menit sejak OTP terakhir dikirim
        if ($lastSentTime && now()->diffInSeconds($lastSentTime) < 60) {
            return redirect()->back()->with('error', 'Silakan tunggu sebelum meminta OTP baru.');
        }

        // Hapus OTP lama
        Otp::where('user_id', $user->id)->delete();

        // Buat OTP baru
        $newOtp = rand(100000, 999999); // 6 digit OTP

        // Simpan ke database
        OTP::create([
            'user_id' => $user->id,
            'otp' => $newOtp,
            'expires_at' => now()->addMinutes(5), // OTP berlaku selama 5 menit
            'created_at' => now(),
        ]);

        //send otp to user email
        Mail::send('emails.otp', ['otp' => $newOtp], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Email Verification OTP');
        });

        // Simpan waktu pengiriman OTP dalam session
        session(['last_otp_sent_time' => now()]);

        return redirect()->back()->with('success', 'OTP baru telah dikirim.');
    }
}
