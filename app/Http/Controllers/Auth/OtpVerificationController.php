<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OtpVerificationController extends Controller
{
    public function showVerifyForm()
    {
        // Show the OTP verification form
        return view('pages.auth.verify');
    }

    public function verify(Request $request)
    {
        //otp is required and must be numeric
        $request->validate([
            'otp' => 'required|numeric',
        ]);

        //check if the otp exists and is not expired
        $otp = Otp::where('otp', $request->otp)->first();

        //if otp is invalid or expired
        if (!$otp) {
            return redirect()->back()->withErrors(['otp' => 'Invalid OTP.']);
        }

        if (Carbon::now()->gt($otp->expires_at)) {
            // Delete the expired OTP
            $otp->delete();
            return redirect()->back()->withErrors(['otp' => 'OTP expired.']);
        }

        //mark the user email as verified
        $otp->user->email_verified_at = Carbon::now();
        $otp->user->save();

        $otp->delete();

        return redirect()->route('login')->with('success', 'Email verified successfully! You can now log in.');
    }
}
