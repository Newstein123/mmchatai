<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;

class VerificationController extends Controller
{
    public function verify(Request $request, $id)
   {
        $user = Customer::findOrFail($id);


        if (!$request->hasValidSignature()) {
            abort(403);
        }


        if ($user->hasVerifiedEmail()) {
            return redirect('/');
        }


        $user->markEmailAsVerified();
        event(new Verified($user));


        return redirect()->route('login')->with('success', 'Email Verification successful');
   }

}
