@extends('layouts.frontendProfile')
@section('title', "Profile")
@section('content')
        <div class="home-container" >
            <div class="row">
                    <div class="main-content mt-5">
                            <div class="container mt-4">
                                <div class="col-lg-10 offset-1"> 
                                    <div class="card ">
                                        <div class="card-body">
                                            <a href="{{route('profilePage')}}" class="text-decoration-none text-dark"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
                                            <div class="card-title">
                                                <h3 class="text-center title-2"><i class="fa-solid fa-unlock"></i> Change Password</h3>
                                            </div>
                                            <hr>
                                            @if (session('wrongPassword'))
                                            <div class="col-12 py-2">
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <i class="fa-solid fa-circle-xmark"></i> {{session('wrongPassword')}}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                  </div>
                                            </div>
                                            @endif
                                            <form action="{{route ('ProfilePasswordChange') }}" method="post" novalidate="novalidate">
                                                        @csrf
                                                        <div class="form-group row mb-3">
                                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Old Password</label>
                                                            <div class="col-sm-10">
                                                              <input type="password" name="oldpassword" class="form-control @error('oldpassword') is-invalid @enderror" id="colFormLabel" placeholder="Enter Old Password..." >
                                                              @error('oldpassword')
                                                              <div class="invalid-feedback">
                                                                  {{$message}}
                                                              </div>
                                                            @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label for="colFormLabel" class="col-sm-2 col-form-label">New Password</label>
                                                            <div class="col-sm-10">
                                                              <input type="password" name="newpassword" class="form-control @error('newpassword') is-invalid @enderror" id="colFormLabel" placeholder="Enter New Password...">
                                                              @error('newpassword')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                            @enderror
                                                            </div> 
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label for="colFormLabel" class="col-sm-2 col-form-label">Confirm Password</label>
                                                            <div class="col-sm-10">
                                                              <input type="password" name="confirmpassword" class="form-control @error('confirmpassword') is-invalid @enderror" id="colFormLabel" placeholder="Enter Confirm Password...">
                                                              @error('confirmpassword')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                            @enderror
                                                            <div class="my-1"> 
                                                                <button id="payment-button" type="submit" class="btn bg-custom text-white mt-3" >
                                                                       Change Password 
                                                                </button>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                 </form>
                                        </div>  
                                    </div>
                                </div>
                            </div> 
                </div>
            </div>
        </div>
    </div>
  @endsection


