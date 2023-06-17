@extends('admin.layouts.app')
@section('title', 'Advertisement Page')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2> Advertisement </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <a> Advertising </a>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
            <a href="{{ route('ads#CreatePage') }}" class="btn btn-success btn-xs  mt-5">
                <i class="fa fa-plus"></i> Create</a>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <h5> Advertisement </h5>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th> Id </th>
                                        <th> Name </th>
                                        <th> Position </th>
                                        <th> Link </th>
                                        <th>Image </th>
                                        <th>Status</th>
                                        <th> Click Count </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ads as $ad)
                                        <tr class="gradeU">
                                            <td>{{ $ad->id }}</td>
                                            <td>{{ $ad->name }}</td>
                                            <td> {{$ad->position}} </td>
                                            <td>{{ $ad->link }}</td>
                                            <td>
                                                @if ($ad->image == null)
                                                    <img src="{{ asset('img/ads/default-img.jpg') }}"
                                                        style="width:150px;height:100px;" alt="">
                                                @else
                                                    <img src="{{ asset('storage/ads/' . $ad->image) }}"
                                                        class="img-thumbnail" style="width:150px;height:100px;"
                                                        alt="">
                                                @endif
                                            </td>
                                            
                                            <td width='20%'>
                                                <div class="switch">
                                                    <div class="onoffswitch slide round">
                                                        <input type="checkbox" value="{{ $ad->id }}"
                                                            class="onoffswitch-checkbox adsView"
                                                            id="{{ $ad->id }}" name="status"
                                                            {{ $ad->status == 'yes' ? 'checked' : '' }}
                                                            route={{ route('ChangeAdsStatus', ['id' => $ad->id]) }}>
                                                        <label class="onoffswitch-label" for="{{ $ad->id }}">
                                                            <span class="onoffswitch-inner"></span>
                                                            <span class="onoffswitch-switch"></span>
                                                        </label>
                                                    </div>
                                            </td>
                                            <td> {{$ad->click_counts}} </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @can('edit users')
                                                        <div class="mr-2">
                                                            <a href="{{ route('ads#EditPage', $ad->id) }}"
                                                                class="btn bg-custom btn-sm"><i class="fa fa-edit"
                                                                    aria-hidden="true" data-toggle="tooltip"
                                                                    data-placement="top" title="ပြင်ဆင်မည်"></i></a>
                                                        </div>
                                                    @endcan
                                                    @can('delete users')
                                                        <div class="mr-2">
                                                            <button class="btn btn-danger btn-sm clear_all" data-url="{{route('ads#delete', $ad->id)}}">
                                                             <i class="fa fa-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="ဖျက်သိမ်းမည်" 
                                                                ></i>
                                                            </button>
                                                        </div>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th> Id </th>
                                        <th> Name </th>
                                        <th> Position </th>
                                        <th>Link  </th>
                                        <th> Image</th>
                                        <th>Status </th>
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
