@extends('layouts.frontend')
@section('title', 'Profile')
@section('content')
    <div class="container ">
        <div class="row justify-content-center vh-100" >
            <div class="col-md-8">
                <div class="bg-transpart">
                    <h3 class="text-white text-center pt-5">{{ __('Edit Password') }}</h3>
                    <div class="card-body mb-5 pt-4">
                        @if (session('wrongPassword'))
                            <div class="col-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fa-regular fa-circle-check"></i> {{ session('wrongPassword') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                        <form method="post" action="{{ route('ProfilePasswordChange') }}">
                            @csrf
                            <div class="row mb-4  my-3 py-2">
                                <div class="col-md-12">
                                    <input type="password" class="form-control @error('oldpassword')is-invalid @enderror"
                                        name="oldpassword" placeholder="Old Password...">
                                    @error('oldpassword')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4  my-3 py-2">
                                <div class="col-md-12">
                                    <input type="password" class="form-control @error('oldpassword')is-invalid @enderror"
                                        name="newpassword" placeholder="New Password...">
                                    @error('newpassword')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4  my-3 py-2">
                                <div class="col-md-12">
                                    <input type="password" class="form-control @error('oldpassword')is-invalid @enderror"
                                        name="confirmpassword" placeholder="Confirm Password...">
                                    @error('confirmpassword')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6">
                                    <button class="btn bg-custom" type="submit"><small class="">Change Password</small></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
