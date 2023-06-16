@extends('layouts.frontendProfile')
@section('title', 'Profile')
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-8 ">
                <div class="card ">
                    <h3 class="text-center text-dark pt-5">{{ __('User Profile') }}</h3>
                    <div class="card-body mb-5 pt-4">
                        <div class="ibox-content">
                            <div class="table-responsive my-3">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td> Name </td>
                                            <td> {{ session('user')->name }}</td>
                                        </tr>
                                        <tr>
                                            <td> Email </td>
                                            <td> {{ session('user')->email }}</td>
                                        </tr>
                                        <tr>
                                            <td> Phone </td>
                                            <td> {{ session('user')->phone }} </td>
                                        </tr>
                                        <tr>
                                            <td> Date Of Use </td>
                                            <td> {{ session('user')->created_at->toFormattedDateString() }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8">
                                <a class="btn btn-sm bg-custom" href="{{ route('PasswordChangePage') }}">
                                    Password
                                </a>
                                <a href="{{ route('home') }}" class="btn btn-sm bg-custom">Back Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
