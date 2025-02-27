<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Otp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.auth.register');
    }

    //store user data from registration form
    public function store(Request $request)
    {
        //validate user input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
        ]);

        //if validator error send an error message
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //store user data
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        //randomize otp
        $otp = rand(100000, 999999);
        Otp::create([
            'user_id' => $user->id,
            'otp' => $otp,
            'expires_at' => Carbon::now()->addMinutes(5),
        ]);

        //send otp to user email
        Mail::send('emails.otp', ['otp' => $otp], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Email Verification OTP');
        });

        // Simpan email ke sesi untuk keperluan resend OTP
        Session::put('register_email', $user->email);
        
        return redirect()->route('otp.verify.form')->with('success', 'Registration successful! Please check your email for the OTP.');
    }
}
?>
