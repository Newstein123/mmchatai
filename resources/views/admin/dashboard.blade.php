@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-success float-right"> All </span>
                </div>
                <h5> Users  </h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"> {{ $users_count}} </h1>
                <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                <small>Total Users </small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-info float-right"> All </span>
                </div>
                <h5> Tokens Used </h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"> {{$tokens}} </h1>
                <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                <small> Total Tokens </small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-info float-right"> Daily </span>
                </div>
                <h5> Tokens Used </h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"> {{$daily_tokens}} </h1>
                <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                <small> Total Tokens </small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-info float-right"> All </span>
                </div>
                <h5> Total Character Used </h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"> {{$tokens * 4}} </h1>
                <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                <small> Total Characters </small>
            </div>
        </div>
    </div>
</div>
</div>
@endsection