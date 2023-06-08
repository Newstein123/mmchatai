@extends('admin.layouts.app')
@section('title', 'Customer Question Page')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Customer Questions </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <a> Customer Questions </a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <h5> Customer Question Table </h5>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th> Id </th>
                <th> Name </th>
                <th> Email/Phone </th>
                <th> Customer Question  </th>
                <th> Date </th>
            </tr>
            </thead>
            <tbody>
                @php
                    $id = 1;
                @endphp
                @foreach ($history_data as $chat)
                    @foreach ($chat->history_data as $data)
                    <tr class="gradeU">
                        <td> {{ $id++ }} </td>
                        <td> {{ $chat->user->name }}</td>
                        <td> {{$chat->user->email ?? $chat->user->phone}}</td>
                        <td> 
                            {{$data->human}}
                        </td>
                        <td> {{$chat->created_at->toFormattedDateString() }} </td>
                    </tr>
                    @endforeach
                @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th> Id </th>
                <th> Name </th>
                <th> Email/Phone</th>
                <th> Customer Question </th>
                <th> Date </th>
            </tr>
            </tfoot>
            </table>
                </div>

            </div>
        </div>
    </div>
    </div>
</div>
@endsection