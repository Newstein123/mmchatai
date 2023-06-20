@extends('layouts.app')
@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown d-flex align-items-center vh-100">
        <div>
            <a href="/" class="my-3">
                <img src="{{ asset('img/logo/' . generalSetting('logo')) }}" alt="" class="img-fluid w-75">
            </a>
            <h5 class="my-3">Forget Password</h5>
            @include('frontend.session.message')
            <form class="m-t" role="form" action="{{ route('password#email') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control my-3 @error('email') is-invalid @enderror" name="email"
                        placeholder="Enter Email..">
                    @error('email')
                        <span class="text-danger">
                            <small class="text-danger"> {{ $message }}</small>
                        </span>
                    @enderror
                </div>


                <button type="submit" class="btn bg-custom btn-sm block full-width m-b">Send Email</button>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('login') }}" class="btn bg-custom btn-sm block full-width m-b"> Back Login</a>
                </div>
            </form>
        </div>
    </div>
@endsection
