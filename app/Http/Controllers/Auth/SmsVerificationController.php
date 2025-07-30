<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;

class SmsVerificationController extends Controller
{
    public function showSmsVerifyForm()
    {
        return view('auth.sms-verify');
    }

    public function sendSmsCode(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|max:20',
        ]);

        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilio_number = env('TWILIO_PHONE_NUMBER');

        $client = new Client($sid, $token);

        try {
            $verificationCode = rand(100000, 999999);
            Session::put('sms_verification_code', $verificationCode);
            Session::put('sms_phone_number', $request->phone);

            $client->messages->create(
                $request->phone,
                [
                    'from' => $twilio_number,
                    'body' => 'Your verification code is: ' . $verificationCode
                ]
            );
            Session::flash('status', 'Verification code sent to ' . $request->phone);
        } catch (\Exception $e) {
            return back()->withErrors(['phone' => 'Could not send SMS: ' . $e->getMessage()]);
        }

        return back()->with('success', 'Verification code sent to your phone.');
    }

    public function verifySmsCode(Request $request)
    {
        $request->validate([
            'code' => 'required|string|digits:6',
        ]);

        $storedCode = Session::get('sms_verification_code');
        $phoneNumber = Session::get('sms_phone_number');

        if ($request->code == $storedCode) {
            Session::forget('sms_verification_code');
            Session::put('sms_verified', true);

            return redirect()->route('register')->with('success', 'Phone number verified successfully. Please complete your registration.');
        } else {
            return back()->withErrors(['code' => 'Invalid verification code.']);
        }
    }
}
