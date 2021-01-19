<div class="header-bottom hidden-sm-down">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="contentsticky_verticalmenu verticalmenu-main col-lg-3 col-md-1 d-flex"
                 data-textshowmore="Show More" data-textless="Hide" data-desktop_item="4">
                <div class="toggle-nav d-flex align-items-center justify-content-start">
                    <span class="btnov-lines"></span>
                    <span>Shop By Categories</span>
                </div>
                <div class="verticalmenu-content has-showmore show">
                    <div id="_desktop_verticalmenu" class="nov-verticalmenu block" data-count_showmore="6">
                        <div class="box-content block_content">
                            <div id="verticalmenu" class="verticalmenu" role="navigation">
                                <ul class="menu level1">

                                    @isset($categories)
                                        @foreach($categories as $category)
                                            <li class="item  parent"><a href="{{route('category',$category -> slug )}}" title="Laptops &amp; Accessories"><i
                                                        class="hasicon nov-icon"
                                                        style="background:url('{{ $category -> photo }}') no-repeat scroll center center;">

                                                    </i>{{$category -> name}}</a>

                                                @isset($category -> childrens)

                                                    <span
                                                        class="show-sub fa-active-sub"></span>
                                                    <div class="dropdown-menu" style="width:222px">
                                                        <ul>
                                                            @foreach($category -> childrens as $childern)
                                                                <li class="item ">
                                                                <li class="item  parent">
                                                                    <a href="{{route('category',$childern -> slug )}}"
                                                                       title="Laptop Thinkpad">{{$childern -> name}}</a>
                                                                    @isset($childern -> childrens )
                                                                        <span class="show-sub fa-active-sub"></span>
                                                                        <div class="dropdown-menu">
                                                                            <ul>
                                                                                @foreach($childern -> childrens  as $_childern)
                                                                                    <li class="item ">
                                                                                        <a href="{{route('category',$_childern -> slug )}}"
                                                                                           title="Aliquam lobortis">
                                                                                            {{$_childern -> name}}
                                                                                        </a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    @endisset
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endisset
                                            </li>
                                        @endforeach
                                    @endisset


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-11 header-menu d-flex align-items-center justify-content-start">
                <div class="header-menu-search d-flex justify-content-between w-100 align-items-center">

                    <div id="_desktop_top_menu">
                        <nav id="nov-megamenu" class="clearfix">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div id="megamenu" class="nov-megamenu clearfix">
                                <ul class="menu level1">
                                    <li class="item home-page "><span class="opener"></span><a
                                            href="{{ route('home') }}" title="Home"><i class="zmdi zmdi-home"></i>{{ __('site/site.Home') }}</a>
                                        
                                    </li>
                                    <li class="item  "><span class="opener"></span><a href="{{ route('wishlist.products.index') }}" title="Blog"><i
                                                class="zmdi zmdi-library"></i>{{ __('site/site.wishlist') }}</a>
                                        
                                    </li>
                                    <li class="item  "><span class="opener"></span><a href="{{ route('information.about') }}" title="{{ __('site/site.information_about') }}"><i
                                        class="zmdi zmdi-library"></i>{{ __('site/site.information_about') }}</a>
                                
                                    </li>
                                   
                                </ul>
                            </div>
                        </nav>
                    </div>

                    <div class="advencesearch_header">
                        <span class="toggle-search hidden-lg-up"><i class="zmdi zmdi-search"></i></span>
                        <div id="_desktop_search" class="contentsticky_search">
                            <!-- block seach mobile -->
                            <!-- Block search module TOP -->
                            <div id="desktop_search_content" data-id_lang="1" data-ajaxsearch="1"
                                 data-novadvancedsearch_type="top" data-instantsearch="" data-search_ssl=""
                                 data-link_search_ssl="http://demo.bestprestashoptheme.com/savemart/en/search"
                                 data-action="http://demo.bestprestashoptheme.com/savemart/en/module/novadvancedsearch/result">
                                <form action="/search" method="get" id="searchbox" class="form-novadvancedsearch">
                                    <div class="input-group">
                                        <input type="text" id="search_query_top" class="search_query ui-autocomplete-input form-control"
                                               name="search"  placeholder="Search">
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="submit"><i
                                                    class="material-icons">{{ __('site/site.search') }}</i></button>
		                                </span>
                                    </div>

                                </form>
                            </div>
                            <!-- /Block search module TOP -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
