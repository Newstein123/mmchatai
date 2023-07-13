@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
@php
    $userDataByMonth = json_encode($userData);
    $questionDataByMonth = json_encode($questionData)
@endphp
<div class="row">
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-success float-right"> <a href="{{route('customerIndex')}}">All</a> </span>
                </div>
                <h5> Customers  </h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"> {{ number_format($users_count, 0, '.', ',')}} </h1>
                <small>Total Customers </small>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="ibox-tools">
                    <span class="label label-success float-right"> <a href="{{route('customerIndex', ['date'=> date('Y-m-d')])}}"> Today </a> </span>
                </div>
                <h5> Customers  </h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"> {{ number_format($todayUsers, 0, '.', ',')}} </h1>
                <small>Today Customers </small>
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
</div>
<div class="row">
    <div class="col-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5> User/Question</h5>
            </div>
            <div class="ibox-content p-3">    
                <div class="row justify-content-center">
                    <div class="col-8">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('script')
<script>
    const ctx = document.getElementById('myChart');
    var users = {!! $userDataByMonth !!}
    var questions = {!! $questionDataByMonth !!}
    var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: months, 
        datasets: [
            {
                label: 'No of users',
                data: users,
                borderWidth: 1
            }, 
            {
                label: 'No of questions',
                data: questions ,
                borderWidth: 1    
            }
        ]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
</script>   
@endsection