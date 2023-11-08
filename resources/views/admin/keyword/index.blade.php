@extends('admin.layouts.app')
@section('title', 'Customer Question Page')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> KeyWord Finder  </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <a> Keyword Finder  </a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight  min-vh-100">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <h5> Key Word Finder  </h5>
                </div>
            </div>
            <div class="ibox-content">
                <form action="" method="get">
                    <div class="d-flex justify-content-between align-items-center">
                        <select name="keywords[]" id="" class="form-control my-3 select2 mr-3" multiple>
                            @foreach ($keywords as $keyword)
                                <option value="{{$keyword->name}}"> {{$keyword->name}} </option>
                            @endforeach
                        </select>
                        <button class="btn bg-custom"> Search </button>
                    </div>
                </form>

            </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5 class="text-dark"> Total Question   </h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"> {{$question_count}} </h1>
                    <small>Total Questions : {{$total_question}} </small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Total Customers  </h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"> {{count($user_count)}} </h1>
                    <small>Today Customers : {{$total_user}} </small>
                </div>
            </div>
        </div> 
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Percentage By Questions  </h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"> {{round($totalQuestionByPercentage, 2)}} </h1>
                    <small> Total Percentage : 100% </small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5> Percentage By Users </h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"> {{round($totalUserByPercentage)}} </h1>
                    <small> Total Percentage : 100%  </small>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection