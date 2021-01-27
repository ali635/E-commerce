<!doctype html>
<html lang="en">
<head>


    <meta charset="utf-8">


    <meta http-equiv="x-ua-compatible" content="ie=edge">


    <title>سوق-كوم</title>
    <meta name="description" content="Shop powered by PrestaShop">
    <meta name="keywords" content="">


    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('css')

    <link rel="icon" type="image/vnd.microsoft.icon" href="{{asset('assets/front/img/favicon.ico')}}?1531456858">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/front/img/favicon.ico')}}?1531456858">


    <link href="{{asset('assets/front/css/css.css')}}?family=Roboto:300,400,500,600,700,900" rel="stylesheet">
    <link href="{{asset('assets/front/css/css-1.css')}}?family=Oswald:300,400,500,600,700,900" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('assets/front/themes/vinova_savemart/assets/cache/theme-78026624.css')}}" type="text/css" media="all">


    <script type="text/javascript">
        var added_to_wishlist = "The product was successfully added to your wishlist.";
        var isLogged = false;
        var isLoggedWishlist = false;
        var loggin_required = "You must be logged in to manage your wishlist.";
        var prestashop = {
            "cart": {
                "products": [],
                "totals": {
                    "total": {"type": "total", "label": "Total", "amount": 0, "value": "\u00a30.00"},
                    "total_including_tax": {
                        "type": "total",
                        "label": "Total (tax incl.)",
                        "amount": 0,
                        "value": "\u00a30.00"
                    },
                    "total_excluding_tax": {
                        "type": "total",
                        "label": "Total (tax excl.)",
                        "amount": 0,
                        "value": "\u00a30.00"
                    }
                },
                "subtotals": {
                    "products": {"type": "products", "label": "Subtotal", "amount": 0, "value": "\u00a30.00"},
                    "discounts": null,
                    "shipping": {"type": "shipping", "label": "Shipping", "amount": 0, "value": "Free"},
                    "tax": null
                },
                "products_count": 0,
                "summary_string": "0 items",
                "vouchers": {"allowed": 0, "added": []},
                "discounts": [],
                "minimalPurchase": 0,
                "minimalPurchaseRequired": ""
            },
            "currency": {"name": "British Pound", "iso_code": "GBP", "iso_code_num": "826", "sign": "\u00a3"},
            "customer": {
                "lastname": null,
                "firstname": null,
                "email": null,
                "birthday": null,
                "newsletter": null,
                "newsletter_date_add": null,
                "optin": null,
                "website": null,
                "company": null,
                "siret": null,
                "ape": null,
                "is_logged": false,
                "gender": {"type": null, "name": null},
                "addresses": []
            },
            "language": {
                "name": "English (English)",
                "iso_code": "en",
                "locale": "en-US",
                "language_code": "en-us",
                "is_rtl": "0",
                "date_format_lite": "m\/d\/Y",
                "date_format_full": "m\/d\/Y H:i:s",
                "id": 1
            },
            "page": {
                "title": "",
                "canonical": null,
                "meta": {
                    "title": "Prestashop_Savemart",
                    "description": "Shop powered by PrestaShop",
                    "keywords": "",
                    "robots": "index"
                },
                "page_name": "index",
                "body_classes": {
                    "lang-en": true,
                    "lang-rtl": false,
                    "country-GB": true,
                    "currency-GBP": true,
                    "layout-full-width": true,
                    "page-index": true,
                    "tax-display-enabled": true
                },
                "admin_notifications": []
            },
            "shop": {
                "name": "Prestashop_Savemart",
                "logo": "\/savemart\/img\/prestashopsavemart-logo-1531456858.jpg",
                "stores_icon": "\/savemart\/img\/logo_stores.png",
                "favicon": "\/savemart\/img\/favicon.ico"
            },
            "urls": {
                "base_url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/",
                "current_url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/?home=home_3",
                "shop_domain_url": "http:\/\/demo.bestprestashoptheme.com",
                "img_ps_url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/",
                "img_cat_url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/c\/",
                "img_lang_url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/l\/",
                "img_prod_url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/",
                "img_manu_url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/m\/",
                "img_sup_url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/su\/",
                "img_ship_url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/s\/",
                "img_store_url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/st\/",
                "img_col_url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/co\/",
                "img_url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/themes\/vinova_savemart\/assets\/img\/",
                "css_url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/themes\/vinova_savemart\/assets\/css\/",
                "js_url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/themes\/vinova_savemart\/assets\/js\/",
                "pic_url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/upload\/",
                "pages": {
                    "address": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/address",
                    "addresses": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/addresses",
                    "authentication": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/login",
                    "cart": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/cart",
                    "category": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/index.php?controller=category",
                    "cms": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/index.php?controller=cms",
                    "contact": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/contact-us",
                    "discount": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/discount",
                    "guest_tracking": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/guest-tracking",
                    "history": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/order-history",
                    "identity": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/identity",
                    "index": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/",
                    "my_account": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/my-account",
                    "order_confirmation": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/order-confirmation",
                    "order_detail": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/index.php?controller=order-detail",
                    "order_follow": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/order-follow",
                    "order": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/order",
                    "order_return": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/index.php?controller=order-return",
                    "order_slip": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/credit-slip",
                    "pagenotfound": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/page-not-found",
                    "password": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/password-recovery",
                    "pdf_invoice": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/index.php?controller=pdf-invoice",
                    "pdf_order_return": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/index.php?controller=pdf-order-return",
                    "pdf_order_slip": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/index.php?controller=pdf-order-slip",
                    "prices_drop": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/prices-drop",
                    "product": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/index.php?controller=product",
                    "search": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/search",
                    "sitemap": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/sitemap",
                    "stores": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/stores",
                    "supplier": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/supplier",
                    "register": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/login?create_account=1",
                    "order_login": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/order?login=1"
                },
                "alternative_langs": {
                    "en-us": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/?home=home_3",
                    "fr-fr": "http:\/\/demo.bestprestashoptheme.com\/savemart\/fr\/?home=home_3",
                    "es-es": "http:\/\/demo.bestprestashoptheme.com\/savemart\/es\/?home=home_3",
                    "it-it": "http:\/\/demo.bestprestashoptheme.com\/savemart\/it\/?home=home_3",
                    "pl-pl": "http:\/\/demo.bestprestashoptheme.com\/savemart\/pl\/?home=home_3",
                    "ar-sa": "http:\/\/demo.bestprestashoptheme.com\/savemart\/ar\/?home=home_3"
                },
                "theme_assets": "\/savemart\/themes\/vinova_savemart\/assets\/",
                "actions": {"logout": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/?mylogout="},
                "no_picture_image": {
                    "bySize": {
                        "cart_default": {
                            "url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/en-default-cart_default.jpg",
                            "width": 125,
                            "height": 125
                        },
                        "small_default": {
                            "url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/en-default-small_default.jpg",
                            "width": 150,
                            "height": 150
                        },
                        "medium_default": {
                            "url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/en-default-medium_default.jpg",
                            "width": 210,
                            "height": 210
                        },
                        "home_default": {
                            "url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/en-default-home_default.jpg",
                            "width": 600,
                            "height": 600
                        },
                        "large_default": {
                            "url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/en-default-large_default.jpg",
                            "width": 600,
                            "height": 600
                        }
                    },
                    "small": {
                        "url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/en-default-cart_default.jpg",
                        "width": 125,
                        "height": 125
                    },
                    "medium": {
                        "url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/en-default-medium_default.jpg",
                        "width": 210,
                        "height": 210
                    },
                    "large": {
                        "url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/img\/p\/en-default-large_default.jpg",
                        "width": 600,
                        "height": 600
                    },
                    "legend": ""
                }
            },
            "configuration": {
                "display_taxes_label": true,
                "display_prices_tax_incl": true,
                "is_catalog": false,
                "show_prices": true,
                "opt_in": {"partner": true},
                "quantity_discount": {"type": "discount", "label": "Discount"},
                "voucher_enabled": 0,
                "return_enabled": 0
            },
            "field_required": [],
            "breadcrumb": {
                "links": [{"title": "Home", "url": "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/"}],
                "count": 1
            },
            "link": {"protocol_link": "http:\/\/", "protocol_content": "http:\/\/"},
            "time": 1604517512,
            "static_token": "28add935523ef131c8432825597b9928",
            "token": "cad5fe8236d849a3b4023c4e5ca6a313"
        };
        var psr_icon_color = "#F19D76";
        var search_url = "http:\/\/demo.bestprestashoptheme.com\/savemart\/en\/search";
    </script>


    <script type="text/javascript">
        var baseDir = "/savemart/";
        var static_token = "28add935523ef131c8432825597b9928";
    </script>


    <style type="text/css">
        #main-site {
            background-color: #ffffff;
        }

        @media (min-width: 1200px) {
            .container {
                width: 1200px;
            }

            #header .container {
                width: 1200px;
            }

            .footer .container {
                width: 1200px;
            }

            #index .container {
                width: 1200px;
            }
        }

        #popup-subscribe .modal-dialog .modal-content {
            background-image: url(../modules/novthemeconfig/images/newsletter_bg-1.png);
        }
    </style>

</head>
<body id="index" class="lang-en country-gb currency-gbp layout-full-width page-index tax-display-enabled">


<main id="main-site" class="displayhomenovthree">


    <header id="header" class="header-3 sticky-menu">

        @include('front.includes.header-mobile')
        @include('front.includes.header-top')
        @include('front.includes.header-center')
        @include('front.includes.header-bottom')
    </header>

    <div id="header-sticky">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="d-flex align-items-center col-xl-3 col-md-3">
                    <div class="contentstickynew_verticalmenu"></div>
                    <div class="contentstickynew_logo"></div>
                </div>
                <div class="contentstickynew_search col-xl-7 col-md-6"></div>
                <div class="contentstickynew_group d-flex justify-content-end col-xl-2 col-md-3"></div>
            </div>
        </div>
    </div>


    <aside id="notifications">
        <div class="container">


        </div>
    </aside>

    @yield('slider')
    <div id="wrapper-site">
        <div id="content-wrapper" class="full-width">
            @yield('content')
        </div>
    </div>

    @include('front.includes.footer')
    <div class="canvas-overlay"></div>
    <div id="back-top">
  <span>
    <i class="fa fa-long-arrow-up"></i>  </span>
    </div>
</main>

<div id="mobile_top_menu_wrapper" class="hidden-md-up">
    <div class="content">
        <div id="_mobile_verticalmenu"></div>
    </div>
</div>


<div id="mobile-pagemenu" class="mobile-boxpage d-flex hidden-md-up">
    <div class="content-boxpage col">
        <div class="box-header d-flex justify-content-between align-items-center">
            <div class="title-box">Menu</div>
            <div class="close-box">Close</div>
        </div>
        <div class="box-content">
            <div id="_mobile_top_menu" class="js-top-menu"></div>
        </div>
    </div>
</div>
<div id="mobile-blockcart" class="mobile-boxpage d-flex hidden-md-up">
    <div class="content-boxpage col">
        <div class="box-header d-flex justify-content-between align-items-center">
            <div class="title-box">Cart</div>
            <div class="close-box">Close</div>
        </div>
        <div id="_mobile_cart" class="box-content"></div>
    </div>
</div>
<div id="mobile-pageaccount" class="mobile-boxpage d-flex hidden-md-up" data-titlebox-parent="Account">
    <div class="content-boxpage col">
        <div class="box-header d-flex justify-content-between align-items-center">
            <div class="back-box">Back</div>
            <div class="title-box">Account</div>
            <div class="close-box">Close</div>
        </div>
        <div class="box-content d-flex justify-content-center align-items-center text-center">
            <div>
                <div id="_mobile_account_list">
                    <div class="account-list-content">
                       
                        @guest
                        <a class="register" href="{{route('register')}}" data-link-action="display-register-form">
                            {{ __('site/site.register') }}
                        </a>
                        <span class="or-text">{{ __('site/site.or') }}</span>
                        <a class="login" href="{{ route('login') }}" rel="nofollow" title="Log in to your customer account">{{ __('site/site.sign_in') }}</a>
                    @endguest
                    @auth
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout.form').submit();">Logout</a>
                        <form id="logout.form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endauth
                    <div class="account-list-content">
                        <a class="register" href="{{ route('vendor.index') }}" data-link-action="display-register-form">
                            {{ __('site/site.Register_Vendor') }}
                        </a>
                    </div>
                        <div class="link_wishlist">
                            <a href="{{ route('wishlist.products.index') }}" title="My Wishlists">
                                <i class="fa fa-heart"></i>{{ __('site/site.wishlist') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="links-currency" data-target="#box-currency" data-titlebox="Currency"><span>{{ __('site/site.currency') }}</span><i
                        class="zmdi zmdi-arrow-right"></i></div>
                <div class="links-language" data-target="#box-language" data-titlebox="Language"><span>{{ __('site/site.language') }}</span><i
                        class="zmdi zmdi-arrow-right"></i></div>
            </div>
        </div>
        <div id="box-currency" class="box-content d-flex">
            <div class="w-100">
                <div class="item-currency current">
                    <a title="British Pound" rel="nofollow"
                       href="index-1.htm?home=home_3&amp;SubmitCurrency=1&amp;id_currency=1">USD</a>
                </div>
            </div>
        </div>

        <div id="box-language" class="box-content d-flex">
            <div class="w-100">
                <div class="item-language ">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a hreflang="{{ $localeCode }}"
                     class="d-flex align-items-center"
                     href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"><span> {{ $properties['native'] }}</span></a>
                     <div class="dropdown-divider"></div>
                     @endforeach
                </div>
               
            </div>
        </div>

    </div>
</div>


<div id="stickymenu_bottom_mobile" class="d-flex align-items-center justify-content-center hidden-md-up text-center">
    <div class="stickymenu-item"><a href="{{route('home')}}"><i
                class="zmdi zmdi-home"></i><span>Home</span></a></div>
    <div class="stickymenu-item"><a href="#" class="js-btn-search"><i
                class="zmdi zmdi-search"></i><span>Search</span></a></div>
    <div class="stickymenu-item">
        <div id="_mobile_cart_bottom" class="nov-toggle-page" data-target="#mobile-blockcart"><a href="{{route('site.cart.index')}}"></a></div>
    </div>
    <div class="stickymenu-item"><a href="{{ route('wishlist.products.index') }}"><i class="zmdi zmdi-favorite-outline"></i><span>Wishlist</span></a>
    </div>
    <div class="stickymenu-item"><a href="#" class="nov-toggle-page" data-target="#mobile-pageaccount"><i
                class="zmdi zmdi-account-o"></i><span>Account</span></a></div>
</div>


<script type="text/javascript" src="{{asset('assets/front/themes/vinova_savemart/assets/cache/bottom-3c96ed23.js')}}"></script>

    @yield('scripts')
</body>
</html>
