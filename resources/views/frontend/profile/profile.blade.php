@extends('layouts.frontend')
@section('title', 'Profile')
@section('content')
    <div class="container ">
        <div class="row justify-content-center vh-100">
            <div class="col-md-8">
                <div class="bg-transpart">
                    <h3 class="text-center text-white pt-5">{{ __('User Profile') }}</h3>
                    <div class="card-body mb-5 pt-4 ">
                        <div class="ibox-content">
                            <div class="table-responsive my-3">
                                <table class="table text-white py-2">
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
                                            <td> @if (session('user')->phone)
                                                    {{ session('user')->phone }}   
                                                @else
                                                -
                                                @endif 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Company </td>
                                            <td> @if ( session('user')->company)
                                                    {{ session('user')->company }}
                                                @else
                                                -
                                                @endif
                                            </td>
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
                                <a class="btn bg-custom" href="{{ route('PasswordChangePage') }}">
                                    <small>Change Password</small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
