<?php

namespace App\Http\Controllers\Frontend;

use Closure;
use App\Models\Customer;
use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
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
            'email' => 'required | unique:customers',
            'name' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required| same:password',
            'terms&policy' => 'required',
            // 'g-recaptcha-response' => ['required', function (string $attribute, mixed $value, Closure $fail) {
            //     $g_resposnse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            //         'secret' => config('services.recaptcha.secrect'),
            //         'response' => null,
            //         'remoteip' => request()->ip(),
            //     ]);
            //     if (!$g_resposnse->json('success')) {
            //         $fail("The {$attribute} is invalid.");
            //     }
            // },]
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new Customer();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone') ?? NULL;
        $user->company = $request->input('company');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        
        Mail::to($user->email)->send(new VerifyEmail($user));
        return redirect('/login')->with('message', 'Please verify your email');
        
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
                        !preg_match('/^09/', $value)
                    ) {
                        $fail('Enter valid email or phone number.');
                    }
                },
            ],
            'password' => 'required|min:8',
            // 'g-recaptcha-response' => 'required'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $user = Customer::where('email', $request->type)->orWhere('phone', $request->type)->first();
        if($user) {
            if($user->email_verified_at == "") {
                return redirect()->back()->with('error', 'Please verify your email address');
            }
            if($user->status == 1) {
                return redirect()->back()->with('error', 'You have been banned');
            }
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
