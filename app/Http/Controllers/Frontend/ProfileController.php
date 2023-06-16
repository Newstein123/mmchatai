<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //profile page
    public function index()
    {
        return view('frontend.profile.profile');
    }

    public function ChangePasswordPage()
    {
        return view('frontend.profile.changePassword');
    }

    // change Password
    public function passwordChange(Request $request)
    {
        $this->passwordValidate($request);
        $user = Customer::select('password')->where('id', session('user')->id)->first();
        $dbHashValue = $user->password;
        if (Hash::check($request->oldpassword, $dbHashValue)) {
            $data = [
                'password' => Hash::make($request->newpassword)
            ];
            Customer::where('id', session('user')->id)->update($data);

            session()->forget('user');
            return redirect('/')->with('SuccessPassword', 'Password changed.!Log in again');
        } else {
            return redirect()->route('PasswordChangePage')->with('wrongPassword', 'Password not same try again!');
        }
    }

    // password Validate
    private function passwordValidate($request)
    {
        Validator::make($request->all(), [
            'oldpassword' => 'required',
            'newpassword' => 'required|min:8|max:20',
            'confirmpassword' => 'required|min:6|max:20|same:newpassword'
        ])->validate();
    }
}
