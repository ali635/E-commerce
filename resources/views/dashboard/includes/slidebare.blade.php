<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href=""><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

           


            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{ __('admin/sidebar.main_sections') }} </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{ \App\Models\Category::count() }}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('admin.maincategories') }}"
                                          data-i18n="nav.dash.ecommerce">{{ __('admin/sidebar.all') }}</a>
                    </li>
                    <li><a class="menu-item" href="{{ route('admin.maincategories.create') }}" data-i18n="nav.dash.crypto">{{ __('admin/sidebar.add1_dep') }}</a>
                    </li>
                </ul>
            </li>

            {{-- <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{ __('admin/sidebar.sub_categories') }}   </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{ \App\Models\Category::child()->count() }}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('admin.subcategories') }}"
                                          data-i18n="nav.dash.ecommerce"> {{ __('admin/sidebar.all') }} </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('admin.subcategories.create') }}" data-i18n="nav.dash.crypto">{{ __('admin/sidebar.add_sub_categories') }} </a>
                    </li>
                </ul>
            </li> --}}

            @can('brands')
              <li class="nav-item"><a href=""><i class="la la-male"></i>
                     <span class="menu-title" data-i18n="nav.dash.main">{{ __('admin/sidebar.brands') }}  </span>
                     <span
                            class="badge badge badge-success badge-pill float-right mr-2">{{ \App\Models\Brand::count() }}</span>
                     </a>
                     <ul class="menu-content">
                     <li class="active"><a class="menu-item" href="{{ route('admin.brands') }}"
                                                 data-i18n="nav.dash.ecommerce"> {{ __('admin/sidebar.all') }} </a>
                     </li>
                     <li><a class="menu-item" href="{{ route('admin.brands.create') }}" data-i18n="nav.dash.crypto">{{ __('admin/sidebar.add_brands') }}</a>
                     </li>
                     </ul>
              </li>
            @endcan

              @can('tags') 
              <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{ __('admin/sidebar.tags') }}  </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{ \App\Models\Tag::count() }}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('admin.tags') }}"
                                          data-i18n="nav.dash.ecommerce"> {{ __('admin/sidebar.all') }} </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('admin.tags.create') }}" data-i18n="nav.dash.crypto">{{ __('admin/sidebar.add_tags') }}</a>
                    </li>
                </ul>
              </li>
            @endcan

            @can('products') 
              <li class="nav-item">
                     <a href=""><i class="la la-male"></i>
                     <span class="menu-title" data-i18n="nav.dash.main">{{ __('admin/sidebar.products') }}  </span>
                     <span
                            class="badge badge badge-danger  badge-pill float-right mr-2">{{ \App\Models\Product::count() }}</span>
                     </a>
                     <ul class="menu-content">
                     <li class="active"><a class="menu-item" href="{{ route('admin.products') }}"
                                                 data-i18n="nav.dash.ecommerce"> {{ __('admin/sidebar.all') }} </a>
                     </li>
                     <li><a class="menu-item" href="{{ route('admin.products.general.create') }}" data-i18n="nav.dash.crypto">{{ __('admin/sidebar.add_product') }}</a>
                     </li>
                     </ul>
              </li>
            @endcan


            <li class="nav-item">
              <a href=""><i class="la la-male"></i>
                  <span class="menu-title" data-i18n="nav.dash.main">{{ __('admin/sidebar.products_attr') }}  </span>
                  <span
                      class="badge badge badge-danger  badge-pill float-right mr-2">{{ \App\Models\Attribute::count() }}</span>
              </a>
              <ul class="menu-content">
                  <li class="active"><a class="menu-item" href="{{ route('admin.attributes') }}"
                                        data-i18n="nav.dash.ecommerce"> {{ __('admin/sidebar.all') }} </a>
                  </li>
                  <li><a class="menu-item" href="{{ route('admin.attributes.create') }}" data-i18n="nav.dash.crypto">{{ __('admin/sidebar.add_product') }}</a>
                  </li>
              </ul>
            </li>
            @can('options') 
            <li class="nav-item">
              <a href=""><i class="la la-male"></i>
                  <span class="menu-title" data-i18n="nav.dash.main">{{ __('admin/sidebar.products_option') }}  </span>
                  <span
                      class="badge badge badge-danger  badge-pill float-right mr-2">{{ \App\Models\Option::count() }}</span>
              </a>
              <ul class="menu-content">
                  <li class="active"><a class="menu-item" href="{{ route('admin.options') }}"
                                        data-i18n="nav.dash.ecommerce"> {{ __('admin/sidebar.all') }} </a>
                  </li>
                  <li><a class="menu-item" href="{{ route('admin.options.create') }}" data-i18n="nav.dash.crypto">{{ __('admin/sidebar.add_option') }}</a>
                  </li>
              </ul>
            </li>
            @endcan


            <li class="nav-item"><a href=""><i class="la la-male"></i>
              <span class="menu-title" data-i18n="nav.dash.main">الصلاحيات </span>
              </a>
              <ul class="menu-content">
                     <li class="active"><a class="menu-item" href="{{route('admin.roles.index')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                     </li>
                     <li><a class="menu-item" href="{{route('admin.roles.create')}}" data-i18n="nav.dash.crypto">أاضافة
                            صلاحية </a>
                     </li>
              </ul>
              </li>

              @can('users') 
             <li class="nav-item"><a href=""><i class="la la-male"></i>
                     <span class="menu-title" data-i18n="nav.dash.main">مستخدمي لوحه التحكم </span>
                     </a>
                     <ul class="menu-content">
                            <li class="active"><a class="menu-item" href="{{route('admin.users.index')}}"
                                                 data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                            </li>
                            <li><a class="menu-item" href="{{route('admin.users.create')}}" data-i18n="nav.dash.crypto">أاضافة
                                   جديدة </a>
                            </li>
                     </ul>
              </li>
              @endcan


            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title"
                                                                                    data-i18n="nav.templates.main">{{ __('admin/sidebar.settings') }}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="#" data-i18n="nav.templates.vert.main">{{ __('admin/sidebar.shipping_methods') }}</a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="{{ route('edit.shippings.method','free') }}"
                                   data-i18n="nav.templates.vert.classic_menu">{{ __('admin/sidebar.free_shipping') }}</a>
                            </li>
                            <li><a class="menu-item" href="{{ route('edit.shippings.method','inner') }}">{{ __('admin/sidebar.inner_shipping') }}</a>
                            </li>
                            <li><a class="menu-item" href="{{ route('edit.shippings.method','outer') }}"
                                   data-i18n="nav.templates.vert.compact_menu">{{ __('admin/sidebar.outer_shipping') }}</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="menu-item" href="#"
                            data-i18n="nav.templates.vert.main"> {{__('admin/sidebar.main slider')}} </a>
                            <ul class="menu-content">
                                   <li><a class="menu-item" href="{{route('admin.sliders.create')}}"
                                          data-i18n="nav.templates.vert.classic_menu">{{ __('admin/sidebar.slider') }} </a>
                                   </li>
                            </ul>
                     </li>
                </ul>
            </li>
          
        </ul>
    </div>
</div>
