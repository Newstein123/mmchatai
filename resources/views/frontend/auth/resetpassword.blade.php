@extends('layouts.app')
@section('content')

    <div class="middle-box text-center loginscreen animated fadeInDown d-flex align-items-center vh-100">
        <div>
            <a href="/" class="my-3">
                <img src="{{asset('img/logo/'.generalSetting('logo'))}}" alt="" class="img-fluid w-75">
            </a>
            <h6 class="my-3">Change Password</h6>
            @include('frontend.session.message')
            <form method="POST" action="{{ route('password#update') }}">
                @csrf
                <div class="mb-3">
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email" >
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" >
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Enter Confirm Password" >
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <button type="submit" class="btn btn-sm bg-custom">Update Password</button>
            </form>
        </div>
    </div>
@endsection
