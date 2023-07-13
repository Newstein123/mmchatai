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
                <form action="" method="get">
                    <div class="d-flex justify-content-between align-items-center">
                        <input type="text" placeholder="Enter Question" name= "question" class="form-control my-3 mr-3">
                        <button class="btn bg-custom"> Search </button>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th> Id </th>
                                <th> Name </th>
                                <th> Email/Phone </th>
                                <th> Customer Question  </th>
                                <th> Date </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $id = 1;
                            @endphp
                            @foreach ($history_data as $chat)
                                <tr class="gradeU">
                                    <td> {{ $id++ }} </td>
                                    <td> {{ $chat->user_chat->user->name }}</td>
                                    <td> {{$chat->user_chat->user->email ?? $chat->user_chat->user->phone}}</td>
                                    <td> 
                                        {{$chat->human}}
                                    </td>
                                    <td> {{$chat->created_at->toFormattedDateString() }} </td>
                                    <td>
                                        <a data-toggle="modal" id="AjaxModalCall" 
                                            data-target="#AjaxModal" 
                                            data-url="{{ route('showHistoryAnswer', $chat->id) }}" 
                                            class="btn btn-xs btn-primary text-white"
                                            data-toggle="tooltip" data-placement="top" 
                                            title="view">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th> Id </th>
                                <th> Name </th>
                                <th> Email/Phone</th>
                                <th> Customer Question </th>
                                <th> Date </th>
                                <th> Action </th>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="float-right">
                        {{$history_data->links('admin.layouts.pagination_ui')}}
                    </div>
                </div>
            </div>
    </div>
</div>

{{-- Answer Modal  --}}

<div class="modal fade" id="AjaxModal" role="dialog">
    <div class="modal-dialog modal-lg">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Answer </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class='modal-body'></div>
        </div>
    </div>
</div>

@endsection