@extends('layouts.site')

@section('content')
<div id="wrapper-site">
                  
    <nav data-depth="2" class="breadcrumb-bg">
<div class="container no-index">
<div class="breadcrumb">

<ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="">
    <a itemprop="item" href="{{ route('home') }}">
      <span itemprop="name">{{ __('site/site.main') }}</span>
    </a>
    <meta itemprop="position" content="1">
  </li>
                        <li itemprop="itemListElement" itemscope="" itemtype="">
    <span>{{ __('site/site.information_about') }}</span>
    <meta itemprop="position" content="2">
  </li>
          </ol>

</div>
</div>
</nav>          
            

      
<div class="container no-index">
    <div class="row">
        <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="main">
                <section id="content" class="page-content page-cms page-cms-4">
                    <h1 class="page_title">{{ __('site/site.information_about') }}</h1>
                    <div class="row no-gutters text-center">
                        <div class="col-lg-12 col-md-12 col-sm-12"><a href="#"><img class="img-fluid" src="{{asset('assets/images/information/' . $information->photo) }}" alt="#"></a></div>
                        <div class="col-lg-12 col-md-8 col-sm-12"><br>
                            <div class="cms-block right first">
                                <h3 class="page-subheading ">{{ $information->name }}</h3>
                                <p>{!! $information->description !!}.</p>
                                <p>{!! $information->short_description  !!}.</p> 
                            </div>
                        </div>
                    </div>

                </section>
            </div>


        </div>
    </div>
</div>


@stop