@extends('layouts.admin')
@section('title','صور  |  المنتج')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">{{ __('admin/sidebar.main') }} </a>
                                </li>
                                <li class="breadcrumb-item"><a href="">
                                    {{ __('admin/sidebar.products') }} </a>
                                </li>
                                <li class="breadcrumb-item active"> {{ __('admin/sidebar.product_img') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> {{ __('admin/sidebar.product_img') }} </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                          
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        @isset($images)
                                            @foreach($images as $image)
                                            <img style="width: 250px; height: 250px;" src="{{$image->photo }}">

                                            <a href="{{route('admin.products.photo.delete',['id'=>$image->id])}}"
                                            class="btn btn-outline-danger btn-min-width box-sha
                     dow-3 mr-1 mb-1" style="margin-top: 20px; margin-right: 100px;">{{ __('admin/sidebar.delete') }} </a>
                                            @endforeach
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>


    @stop
