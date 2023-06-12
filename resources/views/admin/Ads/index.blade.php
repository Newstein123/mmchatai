@extends('admin.layouts.app')
@section('title', 'Advertise Page')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2> Advertive </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <a> Advertise </a>
                </li>
            </ol>
        </div>
        <div class="col-md-2 mt-4">
            <a href="" class="btn btn-secondary btn-sm"> <i class="fa fa-plus mr-2"></i> Add Advertise
            </a>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <h5> Customer Table </h5>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table dataTables" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="30%">Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td width="20%">Advertise</td>
                                        <td width="10%">Description</td>
                                        <td class="gallery-img">
                                            <div class="gallery-img">
                                                <a href="" class="gallery-lightbox">
                                                    <img src="" alt="">
                                                </a>
                                            </div>
                                        </td>
                                        <td width='20%'>
                                            <div class="switch">
                                                <div class="onoffswitch slide round">
                                                    -
                                                </div>
                                            </div>
                                        </td>
                                        <td width="10%">
                                            <div class="btn-group">
                                                <a href="" class="btn btn-info btn-xs">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a mmdt_delete="{" delete_question_msg="" delete_cancel_msg=""
                                                    delete_method='DELETE' class="btn btn-danger btn-xs text-white">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
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
