<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class forgetPasswordController extends Controller
{
    //forgetpassword form page
    public function showForgetPasswordForm()
    {
        return view('frontend.auth.forgetpassword');
    }

    // send email success form 
    public function SuccessForm()
    {
        return view('frontend.auth.successForm');
    }

    // forget password mail send
    public function sendResetLinkEmail(Request $request)
    {
        Validator::make($request->all(), ['email' => 'required|email']);

        $customer = Customer::where('email', $request->email)->first();

        if (!$customer) {
            return redirect()->route('forgetpasswordForm')->with(['email' => 'We Could Not Find a customer with that email address']);
        }

        $token = Str::random(10);
        $customer->update(['remember_token' => $token]);
        Mail::to($customer->email)->send(new ResetPasswordEmail($customer, $token));

        return redirect()->route('successForm')->with(['success', 'Reset password link has been sent to your email address']);
    }
}
