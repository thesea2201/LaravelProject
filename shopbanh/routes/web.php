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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [
	'as'=>'home',
	'uses'=>'PageController@getIndex'
]);

Route::get('index', [
	'as'=>'home',
	'uses'=>'PageController@getIndex'
]);

Route::get('home', [
	'as'=>'home',
	'uses'=>'PageController@getIndex'
]);

Route::get('product-type/{productType}',[
	'as'=>'product-type',
	'uses'=>'PageController@getProductType'
]);

Route::get('product/{productId}',[
	'as'=>'product',
	'uses'=>'PageController@getProduct'
]);

Route::get('404',[
	'as'=>'404',
	'uses'=>'PageController@get404'
]);

Route::get('about',[
	'as'=>'about',
	'uses'=>'PageController@getAbout'
]);

Route::get('contact',[
	'as'=>'contact',
	'uses'=>'PageController@getContact'
]);

Route::get('add-to-cart/{productId}',[
	'as'=>'add-to-cart',
	'uses'=>'PageController@getAddToCart'
]);

Route::get('detete-to-cart/{productId}',[
	'as'=>'delete-to-cart',
	'uses'=>'PageController@getDeleteToCart'
]);

Route::get('check-out',[
	'as'=>'checkout',
	'uses'=>'PageController@getCheckOut'
]);

Route::post('check-out',[
	'as'=>'checkout',
	'uses'=>'PageController@postCheckOut'
]);

Route::get('signup',[
	'as'=>'signup',
	'uses'=>'PageController@getSignup'
]);

Route::post('signup',[
	'as'=>'signup',
	'uses'=>'PageController@postSignup'
]);


Route::get('login',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);

Route::post('login',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);

Route::get('logout',[
	'as'=>'logout',
	'uses'=>'PageController@getLogout'
]);

