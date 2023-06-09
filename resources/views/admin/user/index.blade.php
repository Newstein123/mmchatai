@extends('admin.layouts.app')
@section('title', 'User Page')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Admin </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <a> Admin </a>
            </li>
        </ol>
    </div>
    <div class="col-md-2 mt-4">
        <a href="{{ route('userCreate') }}" class="btn btn-secondary btn-sm"> <i class="fa fa-plus mr-2"></i> Add Admin </a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <h5> Admin Table </h5>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th> Id </th>
                <th> User Name </th>
                <th> User Role </th>
                <th> Date </th>
                <th> Action </th>
            </tr>
            </thead>
            <tbody>
                @php
                    $id = 1;
                @endphp
                @foreach ($users as $user)
                    <tr class="gradeU">
                        <td> {{ $id++ }} </td>
                        <td> {{ $user->name }}</td>
                        <td> 
                            @foreach ($user->getRoleNames() as $role)
                                {{$role}}
                            @endforeach
                        </td>
                        <td> {{$user->created_at->toFormattedDateString() }} </td>
                        <td>
                            <div class="d-flex align-items-center">
                                @can('view users')                            
                                <div class="mr-2">
                                    <a href="{{ route('userView', $user->id)}}" class="btn btn-secondary btn-sm"> View Detail </a> 
                                </div>
                            @endcan

                            @if (!$user->hasRole('super-admin'))
                                @can('edit users')
                                    <div class="mr-2">
                                        <a href="{{route('userEdit', $user->id)}}" class="btn bg-custom btn-sm" ><i class="fa fa-edit" aria-hidden="true"
                                        data-toggle="tooltip" data-placement="top" title="ပြင်ဆင်မည်"     
                                        ></i></a>
                                    </div>
                                @endcan
                                @can('delete users')
                                    <div class="mr-2">
                                        <button class="btn btn-danger btn-sm" onclick="deleteForm('{{route('userDelete')}}', {{$user->id}})" ><i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="ဖျက်သိမ်းမည်" 
                                            ></i></button>
                                    </div>
                                @endcan
                            @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th> Id </th>
                <th> User Name </th>
                <th> User Role </th>
                <th> Date </th>
                <th> Action </th>
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