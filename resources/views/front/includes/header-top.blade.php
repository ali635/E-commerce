<div class="header-top hidden-sm-down">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="header-top-left col-lg-6 col-md-6 d-flex justify-content-start align-items-center">
                    <div class="detail-email d-flex align-items-center justify-content-center">
                        <i class="icon-email"></i>
                        <p>Email :  </p>
                        <span>
                  support@gmail.com
                </span>
                    </div>
                    <div class="detail-call d-flex align-items-center justify-content-center">
                        <i class="icon-deal"></i>
                        <p>Today Deals </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 d-flex justify-content-end align-items-center header-top-right">
                    <div class="register-out">
                        <i class="zmdi zmdi-account"></i>
                        <a class="register" href="{{ route('vendor.index') }}" data-link-action="display-register-form">
                            {{ __('site/site.Register_Vendor') }}
                        </a>
                    </div>
                    <div class="register-out">
                        <i class="zmdi zmdi-account"></i>
                        @guest
                            <a class="register" href="{{route('register')}}" data-link-action="display-register-form">
                                {{ __('site/site.register') }}
                            </a>
                            <span class="or-text">{{ __('site/site.or') }}</span>
                            <a class="login" href="{{ route('login') }}" rel="nofollow" title="Log in to your customer account">
                                {{ __('site/site.sign_in') }}
                            </a>
                        @endguest
                        @auth
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout.form').submit();">{{ __('site/site.logout') }}</a>
                            <form id="logout.form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endauth
                    </div>
                    <div id="_desktop_currency_selector" class="currency-selector groups-selector hidden-sm-down currentcy-selector-dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="main">
                            <span class="expand-more">{{ __('site/site.currency') }}</span>
                        </div>
                        <div class="currency-list dropdown-menu">
                            <div class="currency-list-content text-left">
                                <div class="currency-item current flex-first">
                                    <a title="British Pound" rel="nofollow" href="index-1.htm?home=home_3&amp;SubmitCurrency=1&amp;id_currency=1">USD</a>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div id="_desktop_language_selector" class="language-selector groups-selector hidden-sm-down language-selector-dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="main">
                            <span class="expand-more">{{App::getLocale()}}</span>
                        </div>
                        <div class="language-list dropdown-menu">
                            <div class="language-list-content text-left">
                                <div class="language-item current flex-first">
                                    <div class="current">
                                        {{-- <a href="index.htm?home=home_3">
                                            <img class="img-fluid" src="img/1.jpg" alt="English" width="16" height="11"> 
                                            <span>English</span>
                                        </a> --}}
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
        
                                        <div class="dropdown-divider"></div>
                                    @endforeach
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
