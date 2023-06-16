@extends('layouts.frontendProfile')
@section('title', 'Profile')
@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8 ">
            <div class="card ">
                <div class="card-header"> {{ __('User Profile') }}</div>
                <div class="card-body ">
                    <form method="" action="" >
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input  type="text" class="form-control"  name="name" value="{{ session('user')->name }}" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input  type="text" class="form-control"  name="name" value="{{ session('user')->email }}" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>
                            <div class="col-md-6">
                                <input  type="text" class="form-control"  name="name" value="{{ session('user')->phone }}" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Company') }}</label>
                            <div class="col-md-6">
                                <input  type="text" class="form-control"  name="name" value="{{ session('user')->company }}" disabled>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                    <a class="btn bg-custom" href="{{ route('PasswordChangePage') }}">
                                      Change Password
                                    </a>
                                    <a href="{{ route('home') }}" class="btn bg-custom">Back Home</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
