<?php

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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'UserController@index');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::prefix('seller')->group(function () {
    Route::get('/register', 'Auth\SellerRegisterController@showRegistrationForm')->name('seller.register');
    Route::post('/register', 'Auth\SellerRegisterController@register')->name('seller.register.submit');
    Route::get('/login', 'Auth\SellerLoginController@showLoginForm')->name('seller.login');
    Route::post('/login', 'Auth\SellerLoginController@login')->name('seller.login.submit');
    Route::get('/', 'SellerController@index')->name('seller.dashboard');
    Route::get('/logout', 'Auth\SellerLoginController@logout')->name('seller.logout');
    Route::get('/product-advert/{id}', 'SellerController@productAdvertShow')->name('product-advert.show');
});

Route::get('product-advert', 'ProductAdvertController@create')->name('product-advert.create');
Route::post('product-advert', 'ProductAdvertController@store')->name('product-advert.store');


Route::resource('regions', 'RegionController');

Route::resource('categories', 'CategoryController');

Route::resource('adverts', 'AdvertController');

Route::resource('products', 'ProductController');

