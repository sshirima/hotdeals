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
Route::get('/', [
    'uses' => 'AdvertController@getAdvertsAll',
    'as' => 'home']);

Route::get('/sign-out', function () {
    return view('home');
});

Route::get('/help', function () {
    return view('help');
});

Route::get('/sign-in', function () {
    return view('sign_in');
});

Route::get('/sign-up', function () {
    return view('sign_up');
});

Route::get('/advert-details', function () {
    return view('advert_details_default');
});

Route::get('/seller/advert-details', function () {
    return view('advert_details_seller');
});

Route::get('/authorizer/advert-details', function () {
    return view('advert_details_authorizer');
});

Route::get('/admin', function () {
    return view('home_admin');
});

Route::get('/admin/users', function () {
    return view('admin_users');
});

Route::get('/authorizer', function () {
    return view('home_authorizer');
});

Route::get('/seller', function () {
    return view('home_seller');
});

Route::get('/category', function () {
    return view('result_category');
});

Route::get('/search', function () {
    return view('result_search');
});

Route::get('/add-product_advert', function () {
    return view('add_product_advert');
});

Route::get('/add-service_advert', function () {
    return view('add_service_advert');
});

/**
 * SELLER ROUTES
 */
Route::get('/register-seller', [
    'uses' => 'SellerController@registerSeller',
    'as' => 'register-account']);

Route::get('/update-seller', [
    'uses' => 'SellerController@updateSeller',
    'as' => 'update-seller']);

Route::get('/delete-seller', [
    'uses' => 'SellerController@deleteSeller',
    'as' => 'delete-seller']);
/**
 * ADVERTS ROUTES
 */
Route::get('/get-adverts', [
    'uses' => 'AdvertController@getAdvertsAll',
    'as' => 'get-adverts']);

/**
 * SERVICE ADVERTS ROUTES
 */
Route::get('/add-service_advert', [
    'uses' => 'ServiceAdvertController@addServiceAdvert',
    'as' => 'add-service_advert']);

Route::get('/update-service_advert', [
    'uses' => 'ServiceAdvertController@updateServiceAdvert',
    'as' => 'update-service_advert']);

/**
 * PRODUCT ADVERTS ROUTES
 */
Route::get('/add-product_advert', [
    'uses' => 'ProductAdvertController@addProductAdvert',
    'as' => 'add-product_advert']);

Route::get('/update-product_advert', [
    'uses' => 'ProductAdvertController@addProductAdvert',
    'as' => 'update-product_advert']);

/**
 * Route test for accounts
 */
Route::get('/add-account', [
    'uses' => 'AccountController@addAccount',
    'as' => 'add-account']);

Route::get('/update-account', [
    'uses' => 'AccountController@updateAccount',
    'as' => 'update-account']);

Route::get('/delete-account', [
    'uses' => 'AccountController@deleteAccount',
    'as' => 'delete-account']);

/**
 * Route test for seller
 */
Route::get('/add-seller', [
    'uses' => 'SellerController@addSeller',
    'as' => 'register-seller']);

/**
 * Advert routes
 */
Route::get('/add-advert', [
    'uses' => 'AdvertController@addAdvert',
    'as' => 'add-advert']);

Route::get('/update-advert', [
    'uses' => 'AdvertController@updateAdvert',
    'as' => 'update-advert']);

Route::get('/delete-advert', [
    'uses' => 'AdvertController@deleteAdvert',
    'as' => 'update-advert']);

/**
 * Items routes
 */
Route::get('/add-item', [
    'uses' => 'ItemController@addItem',
    'as' => 'add-item']);

Route::get('/update-item', [
    'uses' => 'ItemController@updateItem',
    'as' => 'update-item']);

Route::get('/delete-item', [
    'uses' => 'ItemController@deleteItem',
    'as' => 'delete-item']);

/**
 * Product routes
 */
Route::get('/add-product', [
    'uses' => 'ProductController@addProduct',
    'as' => 'add-product']);

Route::get('/update-product', [
    'uses' => 'ProductController@updateProduct',
    'as' => 'update-product']);

Route::get('/delete-product', [
    'uses' => 'ProductController@deleteProduct',
    'as' => 'delete-product']);

/**
 * Service routes
 */
Route::get('/add-service', [
    'uses' => 'ServiceController@addService',
    'as' => 'add-service']);

Route::get('/update-service', [
    'uses' => 'ServiceController@updateService',
    'as' => 'update-service']);

Route::get('/delete-service', [
    'uses' => 'ServiceController@deleteService',
    'as' => 'delete-service']);

/**
 * Images routes
 */
Route::get('/add-image', [
    'uses' => 'ImagesController@addImage',
    'as' => 'add-image']);

Route::get('/update-image', [
    'uses' => 'ImagesController@updateImage',
    'as' => 'update-image']);

Route::get('/delete-image', [
    'uses' => 'ImagesController@deleteImage',
    'as' => 'delete-image']);

/**
 * Region test route
 */
Route::get('/add-region', [
    'uses' => 'RegionController@addRegion',
    'as' => 'add-region']);

Route::get('/update-region', [
    'uses' => 'RegionController@updateRegion',
    'as' => 'update-region']);

Route::get('/delete-region', [
    'uses' => 'RegionController@deleteRegion',
    'as' => 'delete-region']);

/**
 * Coordinate test routes
 */
Route::get('/add-coordinates', [
    'uses' => 'CoordinateController@addCoordinate',
    'as' => 'add-coordinates']);

Route::get('/update-coordinates', [
    'uses' => 'CoordinateController@updateCoordinate',
    'as' => 'add-coordinates']);

Route::get('/delete-coordinates', [
    'uses' => 'CoordinateController@deleteCoordinate',
    'as' => 'delete-coordinates']);

/**
 * Routes test location
 */
Route::get('/add-location', [
    'uses' => 'LocationController@addLocation',
    'as' => 'add-location']);

Route::get('/update-location', [
    'uses' => 'LocationController@updateLocation',
    'as' => 'update-location']);

Route::get('/delete-location', [
    'uses' => 'LocationController@deleteLocation',
    'as' => 'delete-location']);

/**
 * Routes test for category
 */
Route::get('/add-category', [
    'uses' => 'CategoryController@addCategory',
    'as' => 'add-category']);

Route::get('/update-category', [
    'uses' => 'CategoryController@updateCategory',
    'as' => 'update-category']);

Route::get('/delete-category', [
    'uses' => 'CategoryController@deleteCategory',
    'as' => 'delete-category']);

/**
 * Routes test for Comments
 */
Route::get('/add-comment', [
    'uses' => 'CommentController@addComment',
    'as' => 'add-comment']);

Route::get('/update-comment', [
    'uses' => 'CommentController@updateComment',
    'as' => 'add-comment']);

Route::get('/delete-comment', [
    'uses' => 'CommentController@deleteComment',
    'as' => 'delete-comment']);

/**
 * Route test for Rates
 */
Route::get('/add-rate', [
    'uses' => 'RateController@addRate',
    'as' => 'add-rate']);

Route::get('/update-rate', [
    'uses' => 'RateController@updateRate',
    'as' => 'update-rate']);

Route::get('/delete-rate', [
    'uses' => 'RateController@deleteRate',
    'as' => 'delete-rate']);

/**
 * Route test for Tags
 */
Route::get('/add-tag', [
    'uses' => 'TagController@addTag',
    'as' => 'add-tag']);

Route::get('/update-tag', [
    'uses' => 'TagController@updateTag',
    'as' => 'update-tag']);

Route::get('/delete-tag', [
    'uses' => 'TagController@deleteTag',
    'as' => 'delete-tag']);

/**
 * Route test for Subcategory
 */
Route::get('/add-subcategory', [
    'uses' => 'SubcategoryController@addSubCategory',
    'as' => 'add-subcategory']);

Route::get('/update-subcategory', [
    'uses' => 'SubcategoryController@updateSubCategory',
    'as' => 'update-subcategory']);

Route::get('/delete-subcategory', [
    'uses' => 'SubcategoryController@deleteSubCategory',
    'as' => 'delete-subcategory']);


