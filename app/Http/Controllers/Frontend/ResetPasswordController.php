<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function showResetPasswordForm($token)
    {
        return view('frontend.auth.resetpassword', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $customer = Customer::where('email', $request->email)
            ->where('remember_token', $request->token)
            ->first();

        if (!$customer) {
            return redirect()->back()->withErrors(['email' => 'Invalid email or token.']);
        }

        $customer->update([
            'password' => Hash::make($request->password),
            'remember_token' => null,
        ]);

        return redirect()->route('login')->with('sent-link', 'Password has been reset successfully. You can now log in with your new password.');
    }
}
