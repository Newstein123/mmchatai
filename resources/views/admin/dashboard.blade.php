@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-success float-right"> All </span>
                </div>
                <h5> Users  </h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"> {{ number_format($users_count, 0, '.', ',')}} </h1>
                <small>Total Users </small>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-info float-right"> All </span>
                </div>
                <h5> Tokens Used </h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"> {{number_format($tokens, 0, '.', ',')}} </h1>
                <small> Total Tokens </small>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-info float-right"> Daily </span>
                </div>
                <h5> Tokens Used </h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"> {{number_format($daily_tokens, 0, '.', ',')}} </h1>
                <small> Total Tokens </small>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-info float-right"> All </span>
                </div>
                <h5> Total Character Used </h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"> {{number_format($tokens*4, 0, '.', ',')}} </h1>
                <small> Total Characters </small>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-info float-right"> All </span>
                </div>
                <h5> Total Questions </h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"> {{number_format($questions, 0, '.', ',')}} </h1>
                <small> Total Questions </small>
            </div>
        </div>
    </div>
</div>
</div>
@endsection