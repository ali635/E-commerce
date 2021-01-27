@extends('layouts.admin')
@section('title','صفحة | المدن والمحافظات')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> {{ __('admin/sidebar.cities') }} </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{ __('admin/sidebar.main') }} </a>
                                </li>
                                <li class="breadcrumb-item active"> {{ __('admin/sidebar.cities') }} 
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
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

                                @include('dashboard.includes.alerts.success')
                                @include('dashboard.includes.alerts.errors')

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table
                                            class="table display nowrap table-striped table-bordered ">
                                            <thead class="">
                                            <tr>
                                                <th>اسم العميل</th>
                                                <th>رقم الهاتف</th>
                                                <th>الاجمالي </th>
                                                <th>حالة الطلب</th>
                                                <th> اسم المنتج </th>
                                            </tr>
                                            
                                            </thead>
                                            <tbody>
                                                @isset($orders)
                                                    @foreach($orders as $order)
                                                        <tr>    
                                                            <td>{{$order->customer_name}}</td>
                                                            <td>{{$order->customer_phone}}</td>
                                                            <td>{{$order->total}}</td>
                                                            <td>{{$order->status}}</td>
                                                            <td>
                                                                @foreach ($order->products as $product)
                                                                    <ul>
                                                                        <li>
                                                                            {{$product->name}}
                                                                        </li>
                                                                        <li>
                                                                            الكمية  => {{$product->pivot->quantity}}
                                                                        </li>

                                                                    </ul>
                                                                @endforeach
                                                            </td>   
                                                        </tr>
                                                    @endforeach
                                                @endisset  
                                            </tbody>
                                        </table>
                                       
                                        <div class="justify-content-center d-flex">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@stop