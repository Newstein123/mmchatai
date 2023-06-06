@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register.submit') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                            <div class="col-md-6 offset-md-4 my-3">
                                <p>Already have an account ? <a href="/login"> Login </a> </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="middle-box text-center loginscreen   animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name">IN+</h1>
        </div>
        <h3>Register to MISL ChatAI</h3>
        <p>Create account to see it in action.</p>
        <form class="m-t" role="form" action="{{route('register.submit')}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control my-3" name="name" placeholder="Name" required="">
            </div>
            <div class="form-group">
                <input type="email" class="form-control my-3" name="email" placeholder="Email" required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control my-3" name="password" placeholder="Password" required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control my-3" name="confirm_password" placeholder="Confirm Password" required="">
            </div>
            <div class="form-group">
                    <div class="checkbox i-checks"><label> <input type="checkbox" name="terms&policy" required><i></i> Agree the terms and policy </label></div>
            </div>
            <button type="submit" class="btn bg-custom block full-width m-b my-3">Register</button>

            <p class="text-muted text-center"><small>Already have an account?</small></p>
            <a class="btn btn-sm bg-custom btn-block" href="{{route('login')}}">Login</a>
        </form>
        <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
    </div>
</div>
@endsection
