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

/**
 * Public un-authentiacted routes
 */
Route::get('/', 'HomeController@index');

Auth::routes();
Route::get('/advert/{id}', 'HomeController@productAdvertShow')->name('product-advert.show');
Route::get('/adverts/category/{id}', 'HomeController@findByCategory')->name('adverts.by.category');

/**
 * Normal user routes
 */
Route::get('/home', 'UserController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/user/advert/{id}', 'UserController@productAdvertShow')->name('user.product-advert.show');
Route::post('/comment/store', 'CommentController@store')->name('comment.store');
Route::post('/comment/update', 'CommentController@update')->name('comment.update');
Route::post('/rate/store', 'RateController@store')->name('rate.store');

/**
 * Admin routes
 */
Route::prefix('admin')->group(function () {
    Route::get('/register', 'Auth\AdminRegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/product-advert/{id}', 'AdminController@productAdvertShow')->name('admin.product-advert.show');
    Route::get('/confirm/delete/{id}', 'AdminController@confirmDestroy')->name('admin.delete.confirm');
    Route::get('/approve/{id}', 'AdminController@approveAdvert')->name('advert.approve');
});
Route::resource('regions', 'RegionController');
Route::resource('categories', 'CategoryController');

Route::get('/accounts/users', 'UserManagerController@displayUsers')->name('accounts.users.index');
Route::get('/accounts/admins', 'UserManagerController@displayAdmins')->name('accounts.admins.index');
Route::get('/accounts/sellers', 'UserManagerController@displaySellers')->name('accounts.sellers.index');
Route::delete('/account/{id}', 'AdminController@destroy')->name('admin.delete.destroy');


/**
 * Seller route
 */
Route::prefix('seller')->group(function () {
    Route::get('/register', 'Auth\SellerRegisterController@showRegistrationForm')->name('seller.register');
    Route::post('/register', 'Auth\SellerRegisterController@register')->name('seller.register.submit');
    Route::get('/login', 'Auth\SellerLoginController@showLoginForm')->name('seller.login');
    Route::post('/login', 'Auth\SellerLoginController@login')->name('seller.login.submit');
    Route::get('/', 'SellerController@index')->name('seller.dashboard');
    Route::get('/logout', 'Auth\SellerLoginController@logout')->name('seller.logout');
    Route::get('/product-advert/{id}', 'SellerController@productAdvertShow')->name('seller.product-advert.show');
});

Route::get('create-advert', 'ProductAdvertController@create')->name('product-advert.create');
Route::post('store-advert', 'ProductAdvertController@store')->name('product-advert.store');

Route::get('edit-advert/{id}', 'ProductAdvertController@edit')->name('product-advert.edit');
Route::post('update-advert/{id}', 'ProductAdvertController@update')->name('product-advert.update');

/*Route::resource('adverts', 'AdvertController');

Route::resource('products', 'ProductController');*/

