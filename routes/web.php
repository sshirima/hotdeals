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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register-seller', [
    'uses' => 'SellerController@registerSellerAccount',
    'as' => 'register-seller']);

Route::get('/update-seller-info', [
    'uses' => 'SellerController@updateSellerAccount',
    'as' => 'update-seller-info']);

Route::get('/delete-seller', [
    'uses' => 'SellerController@deleteSeller',
    'as' => 'delete-seller']);

/**
 * Advert routes
 */
Route::get('/create-advert', [
    'uses' => 'AdvertController@createAdvert',
    'as' => 'create-advert']);

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

