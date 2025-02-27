<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use App\Mail\VerifyEmail;
use App\Models\EmailVerification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class EmailVerificationController extends Controller
{
    public function sendVerificationEmail()
    {
        $user = AuthHelper::user();

        if (!$user || optional($user->email_verification)->verified_at) {
            session()->flash('status', 'error');
            session()->flash('message', 'Your email is already verified or user not found.');
            return response()->json([
                'status' => false,
                'message' => 'Your email is already verified or user not found.',
            ]);
        }

        $token = Str::random(64);

        // dd($token);

        $user->email_verification?->update([
            'token' => $token,
            'token_expire_at' => now()->addHour(),
        ]) ?? EmailVerification::create([
            'user_id' => $user->id,
            'token' => $token,
            'token_expire_at' => now()->addHour(),
        ]);



        try {
            Mail::to($user->email)->send(new VerifyEmail($user, $token));

            session()->flash('status', 'success');
            session()->flash('message', 'Verification email sent successfully.');
            return response()->json([
                'status' => true,
                'message' => 'Verification email sent successfully.',
            ]);
        } catch (\Exception $e) {
            Log::error('Email verification send failed: ' . $e->getMessage());

            session()->flash('status', 'error');
            session()->flash('message', 'Failed to send verification email. Please try again later.');

            return response()->json([
                'status' => false,
                'message' => 'Failed to send verification email. Please try again later.',
            ]);
        }
    }

    public function verifyEmail($token)
    {
        $verification = EmailVerification::where('user_id', AuthHelper::id())->first();

        if (!$verification || $verification->token !== $token || $verification->token_expire_at < now()) {
            return redirect()->route('profile')
                            ->with('status', 'error')
                            ->with('message', 'Invalid or expired verification link.');
        }

        $verification->update([
            'verified_at' => now(),
            'token' => null,
            'token_expire_at' => null
        ]);

        return redirect()->route('email.verified_success')
                        ->with('status', 'success')
                        ->with('message', 'Email verified successfully');
    }


    public function emailVerifiedSuccess()
    {
        return view('email_verified_success');

    }
}
