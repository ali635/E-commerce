@extends('layouts.admin')
@section('title','تعديل |المنتج')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">{{ __('admin/sidebar.main') }}  </a>
                            </li>
                            <li class="breadcrumb-item"><a href="">
                                {{ __('admin/sidebar.products') }} </a>
                            </li>
                            <li class="breadcrumb-item active">{{ __('admin/sidebar.add_product1') }} 
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
                                <h4 class="card-title" id="basic-layout-form"> {{ __('admin/sidebar.add_product') }} </h4>
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
                                <div class="card-body">
                                    <form class="form"
                                          action="{{route('admin.products.general.update',$product->id)}}"
                                          method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input name="id" value="{{$product -> id}}" type="hidden">


                                        <div class="form-body">

                                            <h4 class="form-section"><i class="ft-home"></i> {{ __('admin/sidebar.info_product') }}  </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> {{ __('admin/sidebar.name_product') }}
                                                        </label>
                                                        <input type="text" id="name"
                                                               class="form-control"
                                                               placeholder="  "
                                                               value="{{$product->name}}"
                                                               name="name">
                                                        @error("name")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> {{ __('admin/sidebar.slug') }}
                                                        </label>
                                                        <input type="text"
                                                               class="form-control"
                                                               placeholder="  "
                                                               value="{{$product->slug}}"
                                                               name="slug">
                                                        @error("slug")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">{{ __('admin/sidebar.des_product') }}
                                                        </label>
                                                        <textarea  name="description" id="description"
                                                               class="ckeditor"
                                                               placeholder="  "
                                                               value=""
                                                        >{{$product->description}}</textarea>

                                                        @error("description")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">{{ __('admin/sidebar.des_product1') }}
                                                        </label>
                                                        <textarea  name="short_description" 
                                                        id="ckeditor"
                                                        class="ckeditor"
                                                                   placeholder=""
                                                        >{{$product->short_description}}</textarea>

                                                        @error("short_description")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="row" >
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> {{ __('admin/sidebar.dep_choose') }}
                                                        </label>
                                                        <select name="categories[]" class="select2 form-control" multiple>
                                                            <optgroup label="{{ __('admin/sidebar.dep_choose_please') }} ">
                                                                @if($categories && $categories -> count() > 0)
                                                                    @foreach($categories as $category)
                                                                        
                                                                            <option
                                                                                value="{{$category -> id }}" @if(in_array($category->id,$product->categories->pluck('id')->toArray())) selected @endif>{{$category -> name}}</option>
                                                                               
                                                                    @endforeach
                                                                @endif
                                                            </optgroup>
                                                        </select>
                                                        @error('categories.0')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> {{ __('admin/sidebar.tag_choose') }}
                                                        </label>
                                                        <select name="tags[]" class="select2 form-control" multiple>
                                                            <optgroup label=" {{ __('admin/sidebar.tag_choose') }} ">
                                                                @if($tags && $tags -> count() > 0)
                                                                    @foreach($tags as $tag)
                                                                        <option
                                                                            value="{{$tag -> id }}" @if(in_array($tag->id,$product->tags->pluck('id')->toArray())) selected @endif>{{$tag -> name}}</option>
                                                                    @endforeach
                                                                @endif 
                                                            </optgroup>
                                                        </select>
                                                        @error('tags')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> {{ __('admin/sidebar.brand_choose') }}
                                                        </label>
                                                        <select name="brand_id" class="select2 form-control">
                                                            <optgroup label="{{ __('admin/sidebar.brand_choose') }}">
                                                                @if($brands && $brands -> count() > 0)
                                                                    @foreach($brands as $brand)
                                                                        <option
                                                                            value="{{$brand -> id }}"  @if($brand->id == $product->brand_id) selected @endif>{{$brand -> name}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </optgroup>
                                                        </select>
                                                        @error('brand_id')
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group mt-1">
                                                        <input type="checkbox" value="1"
                                                               name="is_active"
                                                               id="switcheryColor4"
                                                               class="switchery" data-color="success"
                                                               checked/>
                                                        <label for="switcheryColor4"
                                                               class="card-title ml-1">{{ __('admin/sidebar.status') }} </label>

                                                        @error("is_active")
                                                        <span class="text-danger">{{$message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <ul class="nav nav-tabs nav-linetriangle no-hover-bg">
                                                <li class="nav-item">
                                                    <a class="nav-link" id="base-tab41" data-toggle="tab" aria-controls="الاس" href="#tab41" aria-expanded="true">الاسعار</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="base-tab42" data-toggle="tab" aria-controls="tab42" href="#tab42" aria-expanded="false">المخزون</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content px-1 pt-1">
                                                <div role="tabpanel" class="tab-pane" id="tab41" aria-expanded="true" aria-labelledby="base-tab41">
                                                    <div class="card-body">  
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="projectinput1"> {{ __('admin/sidebar.product_price') }}
                                                                        </label>
                                                                        <input type="number" id="price"
                                                                            class="form-control"
                                                                            placeholder="  "
                                                                            value="{{$product->price}}"
                                                                            name="price">
                                                                        @error("price")
                                                                        <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="projectinput1"> {{ __('admin/sidebar.special_product_price') }}
                                                                        </label>
                                                                        <input type="number"
                                                                            class="form-control"
                                                                            placeholder="  "
                                                                            value="{{$product->special_price}}"
                                                                            name="special_price">
                                                                        @error("special_price")
                                                                        <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="projectinput1">{{ __('admin/sidebar.type_price') }}
                                                                        </label>
                                                                        <select name="special_price_type" class="select2 form-control">
                                                                            <optgroup label="من فضلك أختر النوع ">
                                                                                <option value="{{$product->special_price_type}}">precent</option>
                                                                                <option value="{{$product->special_price_type}}">fixed</option>
                                                                            </optgroup>
                                                                        </select>
                                                                        @error('special_price_type')
                                                                        <span class="text-danger"> {{$message}}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row" >
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="projectinput1"> {{ __('admin/sidebar.date_strat_price') }}
                                                                        </label>

                                                                        <input type="date" id="price"
                                                                            class="form-control"
                                                                            placeholder="  "
                                                                            value="{{$product->special_price_start}}"
                                                                            name="special_price_start">

                                                                        @error('special_price_start')
                                                                        <span class="text-danger"> {{$message}}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="projectinput1"> {{ __('admin/sidebar.date_end_price') }}
                                                                        </label>
                                                                        <input type="date" id="price"
                                                                            class="form-control"
                                                                            placeholder="  "
                                                                            value="{{$product->special_price_end}}"
                                                                            name="special_price_end">

                                                                        @error('special_price_end')
                                                                        <span class="text-danger"> {{$message}}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane active" id="tab42" aria-labelledby="base-tab42">
                                                    <div class="card-body">
                                                        <div class="form-body">
                                                            
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="projectinput1">{{ __('admin/sidebar.product_code') }}
                                                                        </label>
                                                                        <input type="text" id="sku"
                                                                            class="form-control"
                                                                            placeholder="  "
                                                                            value="{{$product->sku}}"
                                                                            name="sku">
                                                                        @error("sku")
                                                                        <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="projectinput1">{{ __('admin/sidebar.manage_stock') }}
                                                                        </label>
                                                                        <select name="manage_stock" class="select2 form-control" id="manageStock">
                                                                            <optgroup label="من فضلك أختر النوع ">
                                                                                <option value="{{$product->manage_stock}}">{{ __('admin/sidebar.Tracking_Enabled') }}</option>
                                                                                <option value="{{$product->manage_stock}}">{{ __('admin/sidebar.not_Tracking_Enabled') }}</option>
                                                                            </optgroup>
                                                                        </select>
                                                                        @error('manage_stock')
                                                                        <span class="text-danger"> {{$message}}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                            <!-- QTY  -->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="projectinput1">{{ __('admin/sidebar.product_status') }}
                                                                        </label>
                                                                        <select name="in_stock" class="select2 form-control" >
                                                                            <optgroup label="من فضلك أختر  ">
                                                                                <option value="{{$product->in_stock}}">{{ __('admin/sidebar.available') }}</option>
                                                                                <option value="{{$product->in_stock}}">{{ __('admin/sidebar.not_available') }} </option>
                                                                            </optgroup>
                                                                        </select>
                                                                        @error('in_stock')
                                                                        <span class="text-danger"> {{$message}}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6" style="display:none"  id="qtyDiv">
                                                                    <div class="form-group">
                                                                        <label for="projectinput1">{{ __('admin/sidebar.sku') }}
                                                                        </label>
                                                                        <input type="text" id="sku"
                                                                            class="form-control"
                                                                            placeholder="  "
                                                                            value="{{$product->sku}}"
                                                                            name="qty">
                                                                        @error("qty")
                                                                        <span class="text-danger">{{$message}}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> {{ __('admin/sidebar.back') }}
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> {{ __('admin/sidebar.save1') }}
                                            </button>
                                        </div>
                                    </form>

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

@section('script')

<script>
    $('input:radio[name="type"]').change(
        function(){
            if (this.checked && this.value == '2') {  // 1 if main cat - 2 if sub cat
                $('#cats_list').removeClass('hidden');
            }else{
                $('#cats_list').addClass('hidden');
            }
        });
</script>
<script>
    $(document).on('change','#manageStock',function(){
       if($(this).val() == 1 ){
            $('#qtyDiv').show();
       }else{
           $('#qtyDiv').hide();
       }
    });
</script>
@stop