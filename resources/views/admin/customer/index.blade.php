@extends('admin.layouts.app')
@section('title', 'Customer Page')
@section('content')
@php
    if(session('filter')) {
        $session_name = session('filter')['name'];
        $session_email = session('filter')['email'];
        $session_login_type = session('filter')['login_type'];
        $session_email_verified = session('filter')['email_verified'];
    }
@endphp
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Customer </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin/dashboard">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <a> Customer </a>
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
                    <h5> Customer Table </h5>
                </div>
            </div>
            <div class="ibox-content">
                <form action="" method="get">
                    <div class="d-flex justify-content-between align-items-center">
                        <input type="text" placeholder="Enter Name" name= "name" class="form-control my-3 mr-3"
                        value="{{$session_name}}"
                        >
                        <input type="text" placeholder="Enter Email" name= "email" class="form-control my-3 mr-3"
                        value="{{$session_email}}"
                        >
                        <select name="login_type" id="" class="form-control my-3 mr-3">
                            <option value=""> Select Login Type </option>
                            @php
                                $types = ['google', 'facebook', 'manual']
                            @endphp

                            @foreach ($types as $type)
                                <option value="{{$type}}" 
                                {{$session_login_type == $type ? 'selected' : ''}} class="text-capitalize"> {{$type}} </option>
                            @endforeach
                        </select>
                        <select name="email_verified" id="" class="form-control my-3 mr-3">
                            <option value=""> Select Email Verified  </option>
                            <option value="yes" {{$session_email_verified == "yes" ? 'selected' : ''}} > Yes </option>
                            <option value="no" {{$session_email_verified == "no" ? 'selected' : ''}}  > No </option>
                        </select>
                        <input type="date" name="date" id="" class="form-control my-3">
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
                                <th> Login Type </th>
                                <th> Email Verified </th>
                                <th> Total Tokens </th>
                                <th> Date </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $id = 1;
                            @endphp
                            @if (count($users) > 0)
                                @foreach ($users as $user)
                                    <tr class="gradeU">
                                        <td> {{ $id++ }} </td>
                                        <td> {{ $user->name }}</td>
                                        <td> {{$user->email ?? $user->phone}}</td>
                                        <td> {{$user->login_type}} </td>
                                        <td> {{$user->email_verified_at != "" ? 'YES' : 'NO'}} </td>
                                        <td> 
                                            {{getUserTokens($user->id, 'total_tokens')}}
                                        </td>
                                        <td> {{$user->created_at->toFormattedDateString() }} </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @can('view users')                            
                                                <div class="mr-2">
                                                    <a href="{{ route('customerView', $user->id)}}" class="btn btn-secondary btn-sm"> View Detail </a> 
                                                </div>
                                            @endcan
                                            @can('edit users')
                                                <div class="mr-2">
                                                    <a href="{{route('customerEdit', $user->id)}}" class="btn bg-custom btn-sm" ><i class="fa fa-edit" aria-hidden="true"
                                                    data-toggle="tooltip" data-placement="top" title="ပြင်ဆင်မည်"     
                                                    ></i></a>
                                                </div>
                                            @endcan
                                            @can('ban users')
                                                @if ($user->status == 0)
                                                    <div class="mr-2">
                                                        <button class="btn btn-info btn-sm" onclick="changeState('{{route('changeUserState')}}', {{$user->id}})"> <i class="fa fa-ban" aria-hidden="true" 
                                                        data-toggle="tooltip" data-placement="top" title="ban" 
                                                        ></i>
                                                        </button>
                                                    </div>
                                                @else 
                                                    <div class="mr-2">
                                                        <button class="btn btn-warning btn-sm" onclick="changeState('{{route('changeUserState')}}', {{$user->id}})"> <i class="fa fa-repeat" aria-hidden="true"
                                                        data-toggle="tooltip" data-placement="top" title="redo"     
                                                        ></i> </i>
                                                        </button>
                                                    </div>
                                                @endif
                                            @endcan
                                            @can('delete users')
                                                <div class="mr-2">
                                                    <button class="btn btn-danger btn-sm" onclick="deleteForm('{{route('customerDelete')}}', {{$user->id}})" ><i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="ဖျက်သိမ်းမည်" 
                                                        ></i></button>
                                                </div>
                                            @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="100%"  class="text-center text-danger"> No Data </td>
                                </tr>
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th> Id </th>
                                <th> Name </th>
                                <th> Email/Phone </th>
                                <th> Login Type </th>
                                <th> Email Verified </th>
                                <th> Total Tokens </th>
                                <th> Date </th>
                                <th> Action </th>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="float-right">
                        {{$users->links('admin.layouts.pagination_ui')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection