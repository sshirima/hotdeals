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
Route::get('/home', 'HomeController@home')->name('home');

Auth::routes();

Route::get('/advert/product/{id}', 'DisplayAdverts\ShowProductController@showById')->name('product-advert.show');
Route::get('/advert/service/{id}', 'DisplayAdverts\ShowServiceController@showById')->name('service-advert.show');

Route::get('/advert/products', 'DisplayAdverts\ShowProductController@showAll')->name('product-advert.show-all');
Route::get('/advert/services', 'DisplayAdverts\ShowServiceController@showAll')->name('service-advert.show-all');

Route::get('/products/category/{id}', 'DisplayAdverts\ShowProductController@showByCategory')->name('products.category.show');
Route::get('/services/category/{id}', 'DisplayAdverts\ShowServiceController@showByCategory')->name('services.category.show');

/**
 * Normal user routes
 */

Route::prefix('user')->group(function () {
    Route::get('/', 'UserController@index')->name('user.dashboard');
    Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');
    Route::get('/password/change', 'Auth\ChangePassword\UserCPController@showForm')->name('user.password.change');
    Route::post('/password/change', 'Auth\ChangePassword\UserCPController@changePassword')->name('user.password.update');
    Route::get('advert/products', 'DisplayAdverts\UserShowProductController@showAll')->name('user.product-advert.show-all');
    Route::get('advert/services', 'DisplayAdverts\UserShowServiceController@showAll')->name('user.service-advert.show-all');

    Route::get('advert/product/{id}', 'DisplayAdverts\UserShowProductController@showById')->name('user.product-advert.show');
    Route::get('advert/service/{id}', 'DisplayAdverts\UserShowServiceController@showById')->name('user.service-advert.show');

    Route::get('advert/products/category/{id}', 'DisplayAdverts\UserShowProductController@showByCategory')->name('user.products.category.show');
    Route::get('advert/services/category/{id}', 'DisplayAdverts\UserShowServiceController@showByCategory')->name('user.services.category.show');

    Route::post('/comment/store', 'CommentController@store')->name('comment.store');
    Route::post('/comment/update', 'CommentController@update')->name('comment.update');

    Route::post('/rate/store', 'RateController@store')->name('rate.store');

    Route::get('profile/view', 'AccountProfilesShow\ShowUserProfileController@show')->name('user.profile.show');
    Route::get('profile/edit', 'AccountProfileEdit\EditUserProfileController@edit')->name('user.profile.edit');
    Route::put('profile/update/{id}', 'AccountProfileEdit\EditUserProfileController@update')->name('user.profile.update');
});

/**
 * Admin routes
 */
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/register', 'Auth\AdminRegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/password/change', 'Auth\ChangePassword\AdminCPController@showForm')->name('admin.password.change');
    Route::post('/password/change', 'Auth\ChangePassword\AdminCPController@changePassword')->name('admin.password.update');

    Route::get('advert/products', 'DisplayAdverts\AdminShowProductController@showAll')->name('admin.product-advert.show-all');
    Route::get('advert/services', 'DisplayAdverts\AdminShowServiceController@showAll')->name('admin.service-advert.show-all');

    Route::get('advert/product/{id}', 'DisplayAdverts\AdminShowProductController@showById')->name('admin.product-advert.show');
    Route::get('advert/service/{id}', 'DisplayAdverts\AdminShowServiceController@showById')->name('admin.service-advert.show');

    Route::get('advert/products/approved/by/{admin}', 'DisplayAdverts\AdminShowProductController@approvedByAdmin')->name('admin.product-advert.my-approval');
    Route::get('advert/services/approved/by/{admin}', 'DisplayAdverts\AdminShowServiceController@approvedByAdmin')->name('admin.service-advert.my-approval');

    Route::get('/confirm/delete/{id}', 'AdminController@confirmDestroy')->name('admin.delete.confirm');
    Route::get('/approve/product/{id}', 'AuthorizeAdverts\ApproveAdvertController@approveProduct')->name('product-advert.approve');
    Route::get('/approve/service/{id}', 'AuthorizeAdverts\ApproveAdvertController@approveService')->name('service-advert.approve');

    Route::get('profile/view', 'AccountProfilesShow\ShowAdminProfileController@show')->name('admin.profile.show');
    Route::get('profile/edit', 'AccountProfileEdit\EditAdminProfileController@edit')->name('admin.profile.edit');
    Route::put('profile/update/{id}', 'AccountProfileEdit\EditAdminProfileController@update')->name('admin.profile.update');

    Route::post('password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

});

Route::resource('regions', 'RegionController');
Route::resource('categories', 'CategoryController');
Route::resource('subcategories', 'SubCategoryController');

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
    Route::get('/password/change', 'Auth\ChangePassword\SellerCPasswordController@showForm')->name('seller.password.change');
    Route::post('/password/change', 'Auth\ChangePassword\SellerCPasswordController@changePassword')->name('seller.password.update');

    Route::get('advert/products', 'DisplayAdverts\SellerShowProductController@showAll')->name('seller.product-advert.show-all');
    Route::get('advert/services', 'DisplayAdverts\SellerShowServiceController@showAll')->name('seller.service-advert.show-all');

    Route::get('advert/product/{id}', 'DisplayAdverts\SellerShowProductController@showById')->name('seller.product-advert.show');
    Route::get('advert/service/{id}', 'DisplayAdverts\SellerShowServiceController@showById')->name('seller.service-advert.show');

    Route::get('product/create', 'AddAdverts\AddProductController@create')->name('product-advert.create');
    Route::post('product/create', 'AddAdverts\AddProductController@store')->name('product-advert.store');

    Route::get('product/edit/{product}', 'EditAdverts\EditProductController@edit')->name('product-advert.edit');
    Route::post('products/{product}', 'EditAdverts\EditProductController@update')->name('product-advert.update');

    Route::get('product/delete/{product}', 'DeleteAdverts\DeleteProductController@delete')->name('product-advert.delete');
    Route::delete('product/delete/{product}', 'DeleteAdverts\DeleteProductController@remove')->name('product-advert.remove');

    Route::get('service/create', 'AddAdverts\AddServiceController@create')->name('service-advert.create');
    Route::post('service/create', 'AddAdverts\AddServiceController@store')->name('service-advert.store');

    Route::get('service/edit/{service}', 'EditAdverts\EditServiceController@edit')->name('service-advert.edit');
    Route::post('service/{service}', 'EditAdverts\EditServiceController@update')->name('service-advert.update');

    Route::get('service/delete/{service}', 'DeleteAdverts\DeleteServiceController@delete')->name('service-advert.delete');
    Route::delete('service/delete/{service}', 'DeleteAdverts\DeleteServiceController@remove')->name('service-advert.remove');

    Route::get('advert/products/status/{status}', 'DisplayAdverts\SellerShowProductController@showByStatus')->name('seller.product-advert.status');
    Route::get('advert/services/status/{status}', 'DisplayAdverts\SellerShowServiceController@showByStatus')->name('seller.service-advert.status');

    Route::get('profile/view', 'AccountProfilesShow\ShowSellerProfileController@show')->name('seller.profile.show');
    Route::get('profile/edit', 'AccountProfileEdit\EditSellerProfileController@edit')->name('seller.profile.edit');
    Route::put('profile/update/{id}', 'AccountProfileEdit\EditSellerProfileController@update')->name('seller.profile.update');

    Route::post('password/email', 'Auth\SellerForgotPasswordController@sendResetLinkEmail')->name('seller.password.email');
    Route::get('password/reset', 'Auth\SellerForgotPasswordController@showLinkRequestForm')->name('seller.password.request');
    Route::post('password/reset', 'Auth\SellerResetPasswordController@reset');
    Route::get('password/reset/{token}', 'Auth\SellerResetPasswordController@showResetForm')->name('seller.password.reset');
});

