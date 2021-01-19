@extends('layouts.site')

@section('slider')
    <div id="displayTop" class="displaytopthree">
        <div class="container">
            <div class="row">
                <div class="nov-row  col-lg-12 col-xs-12">
                    <div class="nov-row-wrap row">
                        <div class="nov-html col-xl-3 col-lg-3 col-md-3">
                            <div class="block">
                                <div class="block_content">

                                </div>
                            </div>
                        </div>
                        <div id="nov-slider" class="slider-wrapper theme-default col-xl-9 col-lg-9 col-md-9 col-md-12"
                             data-effect="random" data-slices="15" data-animspeed="500" data-pausetime="10000"
                             data-startslide="0" data-directionnav="false" data-controlnav="true"
                             data-controlnavthumbs="false" data-pauseonhover="true" data-manualadvance="false"
                             data-randomstart="false">
                            <div class="nov_preload">
                                <div class="process-loading active">
                                    <div class="loader">
                                        @isset($sliders)
                                            @foreach($sliders as $slider)
                                                <div class="dot"></div>
                                            @endforeach
                                        @endisset


                                    </div>
                                </div>
                            </div>
                            <div class="nivoSlider">

                                @isset($sliders)
                                    @foreach($sliders as $slider)
                                        <a href="#">
                                            <img src="{{$slider -> photo }}"
                                                 alt="" title="#htmlcaption_42">
                                        </a>
                                    @endforeach
                                @endisset


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop
@section('content')

    <div id="main">

        <section id="content" class="page-home pagehome-three">
            <div class="container">
                <div class="row">
                    <div class="nov-row spacing-30 mt-15 col-lg-12 col-xs-12">
                        <div class="nov-row-wrap row">
                            @isset($banners)
                                    @foreach($banners as $banner)
                                        <div class="nov-image col-lg-4 col-md-4">
                                            <div class="block">
                                                <div class="block_content">
                                                    <div class="effect">
                                                        <a href="#"> <img class="img-fluid"
                                                                        src="{{$banner -> photo }}"
                                                                        alt="banner3-1" title="banner3-1"></a>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                            @endisset
                        </div>
                    </div>
                    <div class="nov-row  col-lg-12 col-xs-12">
                        <div class="nov-row-wrap row">
                            <div class="nov-productlist   productlist-slider      col-xl-12 col-lg-12 col-md-12 col-xs-12 col-md-12 col-lg-12">
                                <div class="block block-product clearfix">
                                    <h2 class="title_block">
                                        TRENDING NOW
                                    </h2>
                                    <div class="block_content">
                                        
                                             <div id="categories-product">
                                                <div id="js-product-list">
                                                    <div class="products product_list grid row" data-default-view="grid">
                                                        @isset($products)
                                                            @foreach($products as $product)
                                                                <div class="item  col-lg-3 col-md-6 col-xs-12 text-center no-padding">
                                                                    <div class="product-miniature js-product-miniature item-one"
                                                                         data-id-product="22" data-id-product-attribute="408" itemscope=""
                                                                         itemtype="http://schema.org/Product">
                                                                        <div class="thumbnail-container">
                                                                            <a href="audio/22-408-aenean-porta-ligula-egestas-east.html#/1-size-s/10-color-red"
                                                                               class="thumbnail product-thumbnail two-image">
                                                                                <img class="img-fluid image-cover"
                                                                                     src="{{$product -> images[0] -> photo ?? ''}}"
                                                                                     alt=""
                                                                                     data-full-size-image-url="{{$product -> images[0] -> photo ?? ''}}"
                                                                                     width="600" height="600">
                                                                                <img class="img-fluid image-secondary"
                                                                                     src="{{$product -> images[0] -> photo ?? ''}}"
                                                                                     alt=""
                                                                                     data-full-size-image-url="{{$product -> images[0] -> photo ?? ''}}"
                                                                                     width="600" height="600">
                                                                            </a>
                    
                    
                                                                            <div class="product-flags new">{{ __('site/site.new') }}</div>
                                                                        </div>
                                                                        <div class="product-description">
                                                                            <div class="product-groups">
                    
                                                                                <div class="category-title"><a
                                                                                        href="">Audio</a>
                                                                                </div>
                    
                                                                                <div class="group-reviews">
                                                                                    <div class="product-comments">
                                                                                        <div class="star_content">
                                                                                            <div class="star"></div>
                                                                                            <div class="star"></div>
                                                                                            <div class="star"></div>
                                                                                            <div class="star"></div>
                                                                                            <div class="star"></div>
                                                                                        </div>
                                                                                        <span>0 review</span>
                                                                                    </div>
                                                                                    <p class="seller_name">
                                                                                        <a title="View seller profile"
                                                                                           href="jmarketplace/2_taylor-jonson/index.htm">
                                                                                            <i class="fa fa-user"></i>
                                                                                            {{$product -> Created_by}}
                                                                                        </a>
                                                                                    </p>
                    
                                                                                    <div class="info-stock ml-auto">
                                                                                        <label class="control-label">{{ __('site/site.Availability') }}:</label>
                                                                                        <i class="fa fa-check-square-o"
                                                                                           aria-hidden="true"></i>
                                                                                        {{$product -> in_stock ? 'in stock' : 'out of stock'}}
                                                                                    </div>
                                                                                </div>
                    
                                                                                <div class="product-title" itemprop="name"><a
                                                                                        href="">{{$product -> name}}</a></div>
                    
                                                                                <div class="product-group-price">
                                                                                    <div class="product-price-and-shipping">
                                                                                        <span itemprop="price"
                                                                                              class="price">{{$product -> special_price ?? $product -> price }}</span>
                                                                                        @if($product -> special_price)
                                                                                            <span
                                                                                                class="regular-price">{{$product -> price}}</span>
                                                                                        @endif
                    
                                                                                    </div>
                                                                                </div>
                    
                                                                                <div class="product-desc" itemprop="desciption">
                                                                                    {!! $product -> description !!}
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-buttons d-flex justify-content-center"
                                                                                 itemprop="offers" itemscope=""
                                                                                 itemtype="http://schema.org/Offer">
                                                                                 <form
                                                                                 action=""
                                                                                 method="post" class="formAddToCart">
                                                                                 @csrf
                                                                                 <input type="hidden" name="id_product"
                                                                                         value="{{$product -> id}}">
                                                                                 <a class="add-to-cart cart-addition addtocart" data-product-id="{{$product -> id}}" data-product-slug="{{$product -> slug}}" href="#"
                                                                                     data-button-action="add-to-cart"><i
                                                                                         class="novicon-cart"></i><span>{{ __('site/site.add_to_cart') }}</span></a>
                                                                             </form>
             
                                                                             <a class="addToWishlist  wishlistProd_22" href="#"
                                                                                 data-product-id="{{$product -> id}}"
                                                                             >
                                                                                 <i class="fa fa-heart"></i>
                                                                                 <span>{{ __('site/site.add_to_wishlist') }}</span>
                                                                             </a>
                                                                             <a href="#" class="quick-view hidden-sm-down"
                                                                                 data-product-id="{{$product->id}}">
                                                                                 <i class="fa fa-search"></i><span> Quick view</span>
                                                                             </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                    
                                                                @include('front.includes.product-details',$product)
                                                            @endforeach
                                                        @endisset
                                                    </div>
                                                </div>
                                            
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nov-row spacing-30 col-lg-12 col-xs-12">
                        <div class="nov-row-wrap row">
                            @isset($banners)
                            @foreach($banners as $banner)
                                <div class="nov-image col-lg-4 col-md-4">
                                    <div class="block">
                                        <div class="block_content">
                                            <div class="effect">
                                                <a href="#"> <img class="img-fluid"
                                                                src="{{$banner -> photo }}"
                                                                alt="banner3-1" title="banner3-1"></a>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    @endisset
                        </div>
                    </div>
                    <div class="nov-row  col-lg-12 col-xs-12">
                        <div class="nov-row-wrap row">
                            

                            <div class="nov-productlist  productlist-rows     col-xl-8 col-lg-8 col-md-8 col-xs-12 col-md-12">
                                <div class="block block-product clearfix">
                                    <h2 class="title_block">
                                        NEW ARRIVALS
                                    </h2>
                                    <div class="block_content">
                                      
                                            
                                            <div class="item  text-center">
                                                @isset($products)
                                                    @foreach($products as $product)
                                                <div class="d-flex flex-wrap align-items-center product-miniature js-product-miniature item-row first_item"
                                                     data-id-product="4" data-id-product-attribute="112"
                                                     itemscope="" itemtype="http://schema.org/Product">
                                                    <div class="col-12 col-w40 pl-0">
                                                        <div class="thumbnail-container">

                                                            <a href="{{route('product.details',$product -> slug)}}"
                                                               class="thumbnail product-thumbnail two-image">
                                                               
                                                                <img class="img-fluid image-cover"
                                                                        src="{{$product -> images[0] -> photo ?? ''}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{$product -> images[0] -> photo ?? ''}}"
                                                                        width="600" height="600">
                                                                        <img class="img-fluid image-secondary"
                                                                        src="{{$product -> images[1] -> photo ?? ''}}"
                                                                        alt=""
                                                                        data-full-size-image-url="{{$product -> images[1] -> photo ?? ''}}"
                                                                        width="600" height="600">
                                                               
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-w60 no-padding">
                                                        <div class="product-description">
                                                            <div class="product-groups">
                                                                <div class="product-comments">
                                                                    <div class="star_content">
                                                                        <div class="star"></div>
                                                                        <div class="star"></div>
                                                                        <div class="star"></div>
                                                                        <div class="star"></div>
                                                                        <div class="star"></div>
                                                                    </div>
                                                                    <span>0 review</span>
                                                                </div>
                                                                <p class="seller_name">
                                                                    <a title="View seller profile"
                                                                       href="jmarketplace/2_taylor-jonson/index.htm">
                                                                        <i class="fa fa-user"></i>
                                                                        {{$product -> Created_by}}
                                                                    </a>
                                                                </p>


                                                                <div class="product-title" itemprop="name"><a
                                                                        href="">
                                                                        {{$product->name}}</a></div>

                                                                <div class="product-group-price">

                                                                    <div class="product-price-and-shipping">


                                                                        <span itemprop="price" class="price">{{$product->price}}</span>


                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="product-buttons d-flex justify-content-center"
                                                            itemprop="offers" itemscope=""
                                                            itemtype="http://schema.org/Offer">
                                                                <form
                                                                    action=""
                                                                    method="post" class="formAddToCart">
                                                                    @csrf
                                                                    <input type="hidden" name="id_product"
                                                                            value="{{$product -> id}}">
                                                                    <a class="add-to-cart cart-addition addtocart"   data-product-id="{{$product -> id}}" data-product-slug="{{$product -> slug}}" href="#"
                                                                        data-button-action="add-to-cart"><i
                                                                            class="novicon-cart"></i><span>{{ __('site/site.add_to_cart') }}</span></a>
                                                                </form>

                                                                <a class="addToWishlist  wishlistProd_22" href="#"
                                                                    data-product-id="{{$product -> id}}"
                                                                >
                                                                    <i class="fa fa-heart"></i>
                                                                    <span>{{ __('site/site.add_to_wishlist') }}</span>
                                                                </a>
                                                                <a href="#" class="quick-view hidden-sm-down"
                                                                    data-product-id="{{$product->id}}">
                                                                    <i class="fa fa-search"></i><span> Quick view</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                  @endforeach
                                                @endisset
                                               
                                            </div>
                                            
                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


    </div>
    @include('front.includes.not-logged')
    @include('front.includes.alert')   <!-- we can use only one with dynamic text -->
    @include('front.includes.alert2')
    @include('front.includes.alert3')

@stop
@section('scripts')
    <script>
        $(document).on('click', '.quick-view', function () {
            $('.quickview-modal-product-details-' + $(this).attr('data-product-id')).css("display", "block");
        });
        $(document).on('click', '.close', function () {
            $('.quickview-modal-product-details-' + $(this).attr('data-product-id')).css("display", "none");
            $('.not-loggedin-modal').css("display", "none");
            $('.alert-modal').css("display", "none");
            $('.alert-modal2').css("display", "none");
            $('.alert-modal3').css("display", "none");
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.addToWishlist', function (e) {
            e.preventDefault();

            @guest()
                $('.not-loggedin-modal').css('display','block');
            @endguest


            $.ajax({
                type: 'POST',
                url: "{{Route('wishlist.store')}}",
                data: {
                    'productId': $(this).attr('data-product-id'),
                },
                success: function (data) {
                    if(data.wished)
                    $('.alert-modal').css('display','block');
                    else
                    $('.alert-modal2').css('display','block');
                }
            });
        });
        $(document).on('click', '.cart-addition', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: "{{Route('site.cart.add')}}",
                data: {
                    'product_id': $(this).attr('data-product-id'),
                    'product_slug' : $(this).attr('data-product-slug'),
                },
                success: function (data) {
                    $('.alert-modal3').css('display','block');
                    
                },
                
            });
        });
    </script>
    <script>
   $(document).ready(function(){
   //create variable
   var counts = 0;
   $(".addtocart").click(function () {
   //to number and increase to 1 on each click
      counts += +1;
      $(".cart-counter").animate({
   //show span with number
                opacity: 1
            }, 300, function () {
   //write number of counts into span
                $(this).text(counts);
            });
        }); 
});
    </script>   
@stop