@extends('admin.layouts.app')
@section('title', 'View Product')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Product  </h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Product</a>
            </li>
            <li class="breadcrumb-item active">
                <a> Detail </a>
            </li>
        </ol>
    </div>
    <div class="col-md-2 mt-4">
        <a href="{{ route('productIndex') }}" class="btn btn-secondary btn-sm"><i class="fa fa-arrow-left mr-2" aria-hidden="true"></i> Go Back </a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
    <div class="ibox ">
        <div class="ibox-title">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h5> Product Detail </h5>
            </div>
        </div>
        <div class="ibox-content">
            <div class="ibox-img">
                <section id="main-slider" class="splide" aria-label="My Awesome Gallery">
                    <div class="splide__track">
                        <ul class="splide__list">
                        @foreach (json_decode($product->image) as $image)
                        <li class="splide__slide">
                            <img
                            src="{{asset('img/fire_vehicles/'.$image)}}"
                            alt=""
                            class="w-100"
                            />
                        </li>
                        @endforeach
                        </ul>
                    </div>
                </section>
                <ul id="thumbnails" class="thumbnails">                
                    @foreach (json_decode($product->image) as $image)
                    <li class="thumbnail">
                        <img src="{{asset('img/fire_vehicles/'.$image)}}" alt="" />
                    </li>
                    @endforeach
                </ul>   
            </div>
            <div class="table-responsive my-3">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td> ပစ္စည်းအမျိုးအမည် </td>
                            <td> {{ $product->name }}</td>
                        </tr>
                        <tr>
                            <td> ပစ္စည်းအမျိုးအစား </td>
                            <td> {{ $product->type }}</td>
                        </tr>
                        <tr>
                            <td> ပစ္စည်းမော်ဒယ်နံပါတ် </td>
                            <td> {{ $product->model_no }}</td>
                        </tr>
                        <tr>
                            <td> ထုတ်လုပ်သည့်ခုနှစ် </td>
                            <td>
                                @php
                                    $year = date('Y', strtotime($product->manufactured_year));
                                @endphp
                                {{$year}}
                            </td>
                        </tr>
                        <tr>
                            <td> စတင်သုံးစွဲသည့်နေ့စွဲ  </td>
                            <td> {{ $product->start_date }}</td>
                        </tr>
                        <tr>
                            <td> အသေးစိတ်  </td>
                            <td> {{ $product->description }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <img src="{{asset('storage/qr-img/'.$product->qr_img)}}" alt="" class="img-fluid w-25">
                </div>
                {{-- <div class="print-visible text-center">
                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->merge('/public/img/logo/'.generalSetting('logo'))->generate('/product/'.$product->id)) !!} ">
                </div> --}}
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection