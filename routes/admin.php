<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        Route::group(['namespace' => 'Dashboard','middleware' => 'auth:admin','prefix' => 'admin'], function () {
            Route::get('/','DashboardController@index')->name('admin.dashboard');
            
            Route::get('logout','LoginController@logout')->name('admin.logout');
           
           
            ##################### settings route #################

        Route::group(['prefix' => 'settings', /*'middleware' => 'can:settings'*/], function () {
                Route::get('shipping-methods/{type}', 'SettingsController@editShippingMethods')->name('edit.shippings.method');
                Route::put('shipping-methods/{id}', 'SettingsController@updateShippingMethods')->name('update.shippings.methods');
            });
            ##################### profile route #################
            Route::group(['prefix' => 'profile'], function () {
                Route::get('edit','ProfileController@editProfile')->name('edit.profile');
                Route::put('update','ProfileController@updateProfile')->name('update.profile');
            });
            Route::group(['prefix' => 'orders'], function () {
                Route::get('/','OrderController@index')->name('admin.orders');
                
            });
            ##################### Categories route ################
            Route::group(['prefix' => 'main_categories','middleware' => 'can:categories'], function () {
                Route::get('/','MainCategoriesController@index') -> name('admin.maincategories');
                Route::get('create','MainCategoriesController@create') -> name('admin.maincategories.create');
                Route::post('store','MainCategoriesController@store') -> name('admin.maincategories.store');
                Route::get('edit/{id}','MainCategoriesController@edit') -> name('admin.maincategories.edit');
                Route::post('update/{id}','MainCategoriesController@update') -> name('admin.maincategories.update');
                Route::get('delete/{id}','MainCategoriesController@destroy') -> name('admin.maincategories.delete');
            });
            ################################## vendors routes ######################################
            Route::group(['prefix' => 'vendors','middleware' => 'can:vendors'], function () {
                Route::get('/','VendorsController@index') -> name('admin.vendor');
            });
            ################################## brands routes ######################################
            Route::group(['prefix' => 'brands','middleware' => 'can:brands'], function () {
                Route::get('/','BrandsController@index') -> name('admin.brands');
                Route::get('create','BrandsController@create') -> name('admin.brands.create');
                Route::post('store','BrandsController@store') -> name('admin.brands.store');
                Route::get('edit/{id}','BrandsController@edit') -> name('admin.brands.edit');
                Route::post('update/{id}','BrandsController@update') -> name('admin.brands.update');
                Route::get('delete/{id}','BrandsController@destroy') -> name('admin.brands.delete');
            });
            ################################## end brands    #####################################
             ################################## Tags routes ######################################
            Route::group(['prefix' => 'tags','middleware' => 'can:tags'], function () {
                Route::get('/','TagsController@index') -> name('admin.tags');
                Route::get('create','TagsController@create') -> name('admin.tags.create');
                Route::post('store','TagsController@store') -> name('admin.tags.store');
                Route::get('edit/{id}','TagsController@edit') -> name('admin.tags.edit');
                Route::post('update/{id}','TagsController@update') -> name('admin.tags.update');
                Route::get('delete/{id}','TagsController@destroy') -> name('admin.tags.delete');
            });
            ################################## end brands    #######################################
            ################################# Product Routes #######################################
            Route::group(['prefix' => 'products','middleware' => 'can:products'], function () {
                Route::get('/','ProductsController@index') -> name('admin.products');
                Route::get('general-information','ProductsController@create') -> name('admin.products.general.create');
                Route::get('show/{id}','ProductsController@show')->name('admin.products.general.show');
                Route::post('store-general-information','ProductsController@store') -> name('admin.products.general.store');
               
                Route::get('images/{id}','ProductsController@addImages') -> name('admin.products.images');
                Route::post('images','ProductsController@saveProductImages') -> name('admin.products.images.store');
                Route::post('images/db','ProductsController@saveProductImagesDB') -> name('admin.products.images.store.db');

                Route::get('delete1/{id}','ProductsController@deleteimage')->name('admin.products.photo.delete');
                Route::get('edit/{id}','ProductsController@edit')->name('admin.products.general.edit');
                
                // Route::post('update/{id}','ProductsController@update')->name('admin.products.general.update');
                Route::get('delete/{id}','ProductsController@destroy')->name('admin.products.general.delete');
            });
             ################################## attributes routes ######################################
             Route::group(['prefix' => 'attributes','middleware' => 'can:attributes'], function () {
                Route::get('/','AttributesController@index') -> name('admin.attributes');
                Route::get('create','AttributesController@create') -> name('admin.attributes.create');
                Route::post('store','AttributesController@store') -> name('admin.attributes.store');
                Route::get('edit/{id}','AttributesController@edit') -> name('admin.attributes.edit');
                Route::post('update/{id}','AttributesController@update') -> name('admin.attributes.update');
                Route::get('delete/{id}','AttributesController@destroy') -> name('admin.attributes.delete');
                
            });
            ################################## information routes ######################################
            Route::group(['prefix' => 'information','middleware' => 'can:information'], function () {
                Route::get('edit','InformationController@edit') -> name('admin.information.edit');
                Route::post('update','InformationController@update') -> name('admin.information.update');
            });
            ################################## end information    #####################################
             ################################## options routes ######################################
             Route::group(['prefix' => 'options','middleware' => 'can:options'], function () {
                Route::get('/','OptionsController@index') -> name('admin.options');
                Route::get('create','OptionsController@create') -> name('admin.options.create');
                Route::post('store','OptionsController@store') -> name('admin.options.store');
                Route::get('edit/{id}','OptionsController@edit') -> name('admin.options.edit');
                Route::post('update/{id}','OptionsController@update') -> name('admin.options.update');
                Route::get('delete/{id}','OptionsController@destroy') -> name('admin.options.delete');
                
            });
            ################################## end options    #####################################

            ################################## cities routes ######################################
        Route::group(['prefix' => 'cities','middleware' => 'can:cities'], function () {
                Route::get('/','CitiesController@index') -> name('admin.cities');
                Route::get('create','CitiesController@create') -> name('admin.cities.create');
                Route::post('store','CitiesController@store') -> name('admin.cities.store');
                Route::get('edit/{id}','CitiesController@edit') -> name('admin.cities.edit');
                Route::post('update/{id}','CitiesController@update') -> name('admin.cities.update');
                Route::get('delete/{id}','CitiesController@destroy') -> name('admin.cities.delete');
                
            });
            ################################## end options    #####################################
       
        ################################## sliders ######################################
        Route::group(['prefix' => 'sliders','middleware' => 'can:sliders'], function () {
            Route::get('/', 'SliderController@addImages')->name('admin.sliders.create');
            Route::post('images', 'SliderController@saveSliderImages')->name('admin.sliders.images.store');
            Route::post('images/db', 'SliderController@saveSliderImagesDB')->name('admin.sliders.images.store.db');

        });
        ################################## end sliders    #######################################
        
        Route::group(['prefix' => 'banners','middleware' => 'can:banners'], function () {
            Route::get('/', 'BannerController@addImages')->name('admin.banners.create');
            Route::post('images', 'BannerController@saveBannerImages')->name('admin.banners.images.store');
            Route::post('images/db', 'BannerController@saveBannerImagesDB')->name('admin.banners.images.store.db');

        });
     
            ################################## end banners    #######################################
            
        ################################## roles ######################################
        Route::group(['prefix' => 'roles','middleware' => 'can:roles'], function () {
            Route::get('/', 'RolesController@index')->name('admin.roles.index');
            Route::get('create', 'RolesController@create')->name('admin.roles.create');
            Route::post('store', 'RolesController@saveRole')->name('admin.roles.store');
            Route::get('/edit/{id}', 'RolesController@edit') ->name('admin.roles.edit') ;
            Route::post('update/{id}', 'RolesController@update')->name('admin.roles.update');
        });
        ################################## end roles ######################################
        /**
         * admins Routes
         */
        Route::group(['prefix' => 'users' , 'middleware' => 'can:users'], function () {
            Route::get('/', 'UsersController@index')->name('admin.users.index');
            Route::get('/create', 'UsersController@create')->name('admin.users.create');
            Route::post('/store', 'UsersController@store')->name('admin.users.store');
        });

        });

        Route::group(['namespace' => 'Dashboard','middleware' => 'guest:admin','prefix' => 'admin'], function () {
            Route::get('login','LoginController@login')->name('admin.login');
            Route::post('login','LoginController@postLogin')->name('admin.post.login');

            

        });
});
