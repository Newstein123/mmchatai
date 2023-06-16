@extends('admin.layouts.app')
@section('title', 'EditPage Ads')
@section('content')

    <!--Start Form -->
    <form method="post" action="{{ route('ads#edit', $ads->id) }}" enctype="multipart/form-data">
        @csrf
        <!-- Page Heading -->
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Update_advertise</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="">advertise_list</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>update_advertise</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">
                <a href="{{ route('ads#Page') }}" class="btn btn-success btn-xs mt-5">
                    <i class="fa fa-reply"></i> back</a>
                <button type="submit" class="btn btn-success btn-xs mt-5">
                    <i class="fa fa-folder"></i> Update
                </button>
            </div>
        </div><!-- Page Heading -->

        <!-- Start Content Row -->
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <!--Name-->
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>name</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="form-group  row">
                                <div class="col-sm-12">
                                    <input type="text" name="name" class="form-control"
                                        @error('name') is-invalid @enderror value="{{ old('name', $ads->name) }}">
                                    @error('name')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Name-->
                    <!--Link-->
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Link</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="form-group  row">
                                <div class="col-sm-12">
                                    <input type="text" name="link" class="form-control"
                                        @error('link') is-invalid @enderror value="{{ old('link', $ads->link) }}">
                                    @error('link')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Link-->
                    <!--Position-->
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Position </h5>
                        </div>
                        <div class="ibox-content">
                            <div class="form-group  row">
                                <div class="col-sm-12">

                                    <select name="position" class="form-control @error('position') is-invalid @enderror">
                                        <option value="popup" {{ $ads->position === 'popup' ? 'selected' : '' }}>Popup
                                        </option>
                                        <option value="footer" {{ $ads->position === 'footer' ? 'selected' : '' }}>Footer
                                        </option>
                                    </select>
                                    @error('position')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Position-->
                    <!--Image -->
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>image</h5>
                        </div>
                        <div class="ibox-content">
                            <img src="{{ asset('storage/ads/' . $ads->image) }}" class="img-fluid w-25 mb-2"
                                id="preview_image_before_upload">
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                                upload="image">
                            @error('image')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <!--Image -->
                </div>
            </div>
        </div><!-- End Content Row -->
    </form><!-- End form -->
@endsection
