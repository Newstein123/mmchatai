@extends('layouts.frontendProfile')
@section('title', "Profile")
@section('content')
<div class="home-container" >
<div class="row">
    <div class="main-content mt-4">
        <div class="container mt-5">
            <div class="col-lg-10 offset-1"> 
                <div class="card ">
                    <div class="card-body">
                        <a href="{{route('home')}}" class="text-decoration-none text-dark"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
                        <div class="card-title">
                            <h3 class="text-center title-2"><i class="fa-solid fa-user-gear"></i> User Info</h3>
                        </div>
                        <hr>
                        <div class="row">
                        <div class="col-lg-10 offset-1">
                        <div class="form-group row mb-3">
                            <label for="colFormLabel" class="col-sm-2 col-form-label"><i class="fa-solid fa-circle-user"></i> Name</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="colFormLabel" value="{{session('user')->name}}" disabled>
                            </div> 
                        </div>
                        <div class="form-group row mb-3">
                            <label for="colFormLabel" class="col-sm-2 col-form-label"><i class="fa-solid fa-envelope-circle-check"></i> Email</label>
                            <div class="col-sm-10">
                              <input type="text"  class="form-control" id="colFormLabel" value="{{session('user')->email}}" disabled>
                            </div> 
                        </div>
                        <div class="form-group row mb-3">
                            <label for="colFormLabel" class="col-sm-2 col-form-label"><i class="fa-solid fa-phone-volume"></i> Phone</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="colFormLabel" value="@if(session('user')->phone) {{session('user')->phone}} @else - @endif" disabled>
                            </div> 
                        </div>
                        <div class="form-group row mb-3">
                            <label for="colFormLabel" class="col-sm-2 col-form-label"><i class="fa-regular fa-building"></i> Company</label>
                            <div class="col-sm-10">
                              <input type="text"  class="form-control" id="colFormLabel" value="{{session('user')->name}}" disabled>
                            </div> 
                        </div>
                        <div class="form-group row mb-3">
                            <label for="colFormLabel" class="col-sm-2 col-form-label"><i class="fa-regular fa-clock"></i> Start Time</label>
                            <div class="col-sm-10">
                              <input type="text"  class="form-control" id="colFormLabel" value="{{session('user')->created_at->diffForHumans()}}" disabled>
                              <div class="my-3">
                                <a href="{{route('PasswordChangePage')}}" class="btn bg-custom text-decoration-none text-white"> Change Password <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                             </div>
                            </div> 
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
</div>
  @endsection
