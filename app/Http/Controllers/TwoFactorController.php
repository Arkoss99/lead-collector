<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FAQRCode\Google2FA;

class TwoFactorController extends Controller
{
    public function generate(Request $request) {
        $user = $request->user();
        $google2fa = new Google2FA();

        $secret = $google2fa->generateSecretKey();

        $qrCodeUrl = $google2fa->getQRCodeInline(
            config('app.name'),
            $user->email,
            $secret,
        );

        return response()->json([
            'secret' => $secret,
            'qr_code' => $qrCodeUrl,
        ]);
    }
    public function enable(Request $request)
    {
        $request->validate([
            'secret' => 'required',
            'otp' => 'required'
        ]);

        $google2fa = app('pragmarx.google2fa');

        $valid = $google2fa->verifyKey($request->secret, $request->otp);

        if (!$valid) {
            return response()->json(['message' => 'Invalid OTP'], 400);
        }

        $user = $request->user();
        $user->two_factor_auth = $request->secret;
        $user->save();

        return response()->json(['message' => '2FA enabled']);
    }
}
