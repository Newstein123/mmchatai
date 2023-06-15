@extends('admin.layouts.app')
@section('title', 'Customer Details')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Customer  </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a> Customer </a>
            </li>
            <li class="breadcrumb-item active">
                <a> Detail </a>
            </li>
        </ol>
    </div>
    <div class="col-md-2 mt-4">
        <a href="{{ route('customerIndex') }}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left mr-2" aria-hidden="true"></i> Go Back </a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h5> Customer Detail </h5>
            </div>
        </div>
        <div class="ibox-content">
            <div class="table-responsive my-3">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td> အမည် </td>
                            <td> {{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td> Email/Phone </td>
                            <td> {{ $user->email ?? $user->phone }}</td>
                        </tr>
                        <tr>
                            <td> Login Type </td>
                            <td> {{ $user->login_type }}</td>
                        </tr>
                        <tr>
                            <td> Email Verified </td>
                            <td> {{ $user->email_verified_at != "" ? 'YES' : 'NO' }}</td>
                        </tr>
                        
                        <tr>
                            <td> Company Name </td>
                            <td> {{ $user->company }}</td>
                        </tr>
                        <tr>
                            <td> Question </td>
                            <td> {{getUserTokens($user->id, 'prompt_tokens')}} Tokens  </td>
                        </tr>
                        <tr>
                            <td> Answer Tokens </td>
                            <td> {{getUserTokens($user->id, 'completion_tokens')}} Tokens </td>
                        </tr>
                        <tr>
                            <td> Total Tokens </td>
                            <td> {{getUserTokens($user->id, 'total_tokens')}} Tokens  </td>
                        </tr>
                        <tr>
                            <td> Status  </td>
                            <td> {{$user->status == 0 ? 'Active' : 'Banned'}} </td>
                        </tr>
                        <tr>
                            <td> စတင်အသုံးပြုသည့်ရက်စွဲ  </td>
                            <td> {{ $user->created_at->toFormattedDateString() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection