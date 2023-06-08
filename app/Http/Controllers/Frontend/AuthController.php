<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showRegisterForm()
    {   
        if(session('user')) {
            return redirect()->to('/');
        }

        return view('frontend.auth.register');
    }

    public function register(Request $request)
    {   

        $validator = Validator::make($request->all(), [
            'type' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $value) &&
                        !preg_match('/^\d{10}$/', $value)
                    ) {
                        $fail('Enter valid email or phone number.');
                    }
                },
            ],
            'name' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required| same:password',
            'terms&policy' => 'required'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $type = $request->type;
        $phone = "";
        $email = "";

        if(preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $type)) {
            $email .=  $type;
        } else {
            $phone .= $type;
        }

        $user = new Customer();
        $user->name = $request->input('name');
        $user->email = $email;
        $user->phone = $phone;
        $user->company = $request->input('company');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        session()->put('user', $user);
        return redirect('/');
    }

    public function showLoginForm()
    {   
        if(session('user')) {
            return redirect()->to('/');
        }
        return view('frontend.auth.login');
    }

    public function login(Request $request)
    {   
    
        $validator = Validator::make($request->all(), [
            'type' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $value) &&
                        !preg_match('/^\d{10}$/', $value)
                    ) {
                        $fail('Enter valid email or phone number.');
                    }
                },
            ],
            'password' => 'required|min:8',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $user = Customer::where('email', $request->type)->orWhere('phone', $request->type)->first();
        if($user) {
            $check = Hash::check($request->password, $user->password);
            if($check) {
                session(['user' => $user]);
                return redirect('/')->with('message', 'Login Successfully');
            } else {
                return redirect()->back()->with('error', 'Your password is incorrect');
            }
        } else {
            return redirect()->back()->with('error', 'Your credentials do not match our records');
        }

        return redirect()->back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function logout()
    {   
        session()->forget('user');
        session()->forget('conversation_id');
        return redirect('/');
    }

    public function redirectToProvider($website)
    {
        return Socialite::driver($website)->redirect();
    }

    public function handleProviderCallback($website)
    {   
        $social_user = Socialite::driver($website)->user();
        $user=Customer::where('email',$social_user->getEmail())->first();
        if(!$user){
            $user = Customer::create([
                'name'=> $social_user->getName(),
                'email'=> $social_user->getEmail(),
                'password' => "",
                'login_type' => $website
            ]);

            session(['user' => $user]);
            return redirect()->route('home');
        } else {
            session(['user' => $user]);
            return redirect('/');
        } 
    }
}
