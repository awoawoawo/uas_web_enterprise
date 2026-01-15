<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'reset_email' => 'required|email'
        ]);

        $user = User::where('email', $request->reset_email)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Email Anda Salah'
            ], 404);
        }

        // Generate OTP (6 digit)
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        // Generate random password baru
        $newPassword = Str::random(12);

        // Hash password baru dengan SHA-256
        $hashedPassword = hash('sha256', $newPassword);

        // Simpan OTP ke kolom reset_token
        $user->reset_token = $otp;
        $user->save();

        // Log ke laravel.log
        Log::info('=== FORGOT PASSWORD REQUEST ===');
        Log::info('Email: ' . $request->reset_email);
        Log::info('OTP: ' . $otp);
        Log::info('New Password: ' . $newPassword);
        Log::info('Hashed Password (SHA-256): ' . $hashedPassword);
        Log::info('Timestamp: ' . now());
        Log::info('================================');

        return response()->json([
            'success' => true,
            'message' => 'Email Terkirim!'
        ], 200);
    }
}
