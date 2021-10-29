<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth',] , function () {
    Route::get('/index', 'AdminController@index')->name('admin');
    Route::group(['prefix' => 'product'], function () {
        Route::resource('/', 'adminProductController');
        Route::get('/products-list', 'adminProductController@list');
        Route::put('/update/{productDataId}', 'adminProductController@update')->name('product.update');
        Route::delete('/destroy/{id}', 'adminProductController@destroy');
    });
    Route::group(['prefix' => 'orders'], function () {
        Route::resource('/order-list', 'adminOrderListController');
        Route::get('/lists', 'adminOrderListController@list');
        Route::get('/listss', 'adminOrderListController@lists');
        Route::get('/listsss', 'adminOrderListController@listss');
        Route::put('/product/update/{id}', 'adminOrderListController@updatePending');
        Route::put('/product/update/completed/{id}', 'adminOrderListController@updateCompleted');
    });
    Route::group(['prefix' => 'order'], function () {
        Route::resource('/complete-orders', 'adminCompleteOrdersController');
        Route::get('/lists', 'adminCompleteOrdersController@list');
    });
    Route::group(['prefix' => 'people'], function () {
        Route::resource('/delivery-boy', 'adminDeliveryBoyController');
    });
    Route::group(['prefix' => 'peoples'], function () {
        Route::resource('/customer', 'adminCustomerController');
        Route::get('/lists', 'adminCustomerController@list');
        Route::put('/update/{id}', 'adminCustomerController@update')->name('customer.update');
        Route::delete('/destroy/{id}', 'adminCustomerController@destroy')->name('customer.destroy');
    });
    Route::group(['prefix' => 'people'], function () {
        Route::resource('/user', 'adminUserController');
    });
    Route::group(['prefix' => 'setting'], function () {
        Route::resource('/category-list', 'adminCategoryListController');
        Route::get('/lists', 'adminCategoryListController@list');
        Route::put('/update/{id}', 'adminCategoryListController@update')->name('category.list.update');
        Route::delete('/destroy/{id}', 'adminCategoryListController@destroy')->name('category.list.destroy');
    });
    Route::group(['prefix' => 'settings'], function () {
        Route::resource('/order-status', 'adminOrderStatusController');
        Route::get('/lists', 'adminOrderStatusController@list');
        Route::put('/update/{id}', 'adminOrderStatusController@update')->name('order.status.update');
        Route::delete('/destroy/{id}', 'adminOrderStatusController@destroy')->name('order.status.destroy');
    });
    Route::group(['prefix' => 'settingss'], function () {
        Route::resource('/banner-management', 'adminBannerManagementController');
    });
    Route::group(['prefix' => 'settingsss'], function () {
        Route::resource('/user-level', 'adminUserLevelController');
        Route::get('/lists', 'adminUserLevelController@list');
        Route::put('/update/{id}', 'adminUserLevelController@update')->name('user.level.update');
        Route::delete('/destroy/{id}', 'adminUserLevelController@destroy')->name('user.level.destroy');
    });
});






Route::group(['prefix' => 'user', 'middleware' => 'auth',] , function () {
    Route::get('/', 'UserController@index')->name('user');
});

Route::group(['prefix' => 'driver', 'middleware' => 'auth',] , function () {
    Route::get('/', 'DriverController@index')->name('driver');
});

