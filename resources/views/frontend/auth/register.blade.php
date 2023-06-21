@extends('layouts.app')

@section('content')

<div class="middle-box text-center loginscreen  animated fadeInDown  d-flex align-items-center vh-100">
    <div>
        <a href="/">
            <img src="{{asset('img/logo/'.generalSetting('logo'))}}" alt="" class="img-fluid w-75">
        </a>
        <h5 class="my-3">Register to MISL ChatAI</h5>
        @include('frontend.session.message')
        <form class="m-t" role="form" action="{{route('register.submit')}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control my-3" name="name" placeholder="Name" required="">
            </div>
            @error('name')
                <span class="text-danger">
                    <small> {{$message}} </small>
                </span> 
            @enderror

            <div class="form-group">
                <input type="email" class="form-control my-3" name="email" placeholder="Email" required="">
            </div>
            @error('email')
                <span class="text-danger">
                    <small>{{$message}}</small>
                </span>
             @enderror

            <div class="form-group">
                <input type="text" class="form-control my-3" name="phone" placeholder="Phone(Optional)">
            </div>
            @error('phone')
                <span class="text-danger">
                    <small>{{$message}}</small>
                </span>
             @enderror

            <div class="form-group">
                <input type="text" class="form-control my-3" name="company" placeholder="Company Name (Optional)">
            </div>

            <div class="form-group">
                <input type="password" class="form-control my-3" name="password" placeholder="Password (Needs at least 8 characters)" required="">
            </div>
            @error('password')
                <span class="text-danger">
                    <small> {{$message}} </small>
                </span> 
            @enderror

            <div class="form-group">
                <input type="password" class="form-control my-3" name="confirm_password" placeholder="Confirm Password" required="">
            </div>
            @error('confirm_password')
                <span class="text-danger">
                    <small> {{$message}} </small>
                </span> 
            @enderror
            <div class="my-3">
                @if(config('services.recaptcha.key'))
                    <div class="g-recaptcha"
                        data-sitekey="{{config('services.recaptcha.key')}}">
                    </div>
                @endif
                @error('g-recaptcha-response')
                    <div class="text-danger">
                        {{$message}}
                    </div>
               @enderror
            </div>
            <div class="form-group">
                    <div class="checkbox i-checks">
                        <label> <input type="checkbox" name="terms&policy" required>
                            Agree the <a href="#">Terms</a> and 
                            <a href="#">Policy</a>
                        </label>
                    </div>
            </div>
            <button type="submit" class="btn bg-custom block full-width m-b my-3">Register</button>

            <p class="text-muted text-center"><small>Already have an account?</small></p>
            <a class="btn btn-sm bg-custom btn-block" href="{{route('login')}}">Login</a>
        </form>
    </div>
</div>
@endsection
