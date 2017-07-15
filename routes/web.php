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
Route::match(['get', 'post'], '/admin', ['uses' => 'AdminController@signin']);


Route::group(['middleware' => 'admin'], function() {
	Route::group(['prefix' => 'admin'], function() {
	    Route::post('/update/product/{id}', ['uses' => 'AdminController@updateProduct']);
	    Route::get('/users', ['uses' => 'AdminController@user']);
	    Route::get('/dashboard', ['uses' => 'AdminController@dashboard']);
	    Route::post('/dashboard', ['uses' => 'AdminController@searchPendingProduct']);
	    Route::get('/logout', ['uses' => 'AdminController@logout']);
	    Route::match(['get', 'post'], '/create', ['uses' => 'AdminController@signup']);
	    Route::match(['get', 'post'], '/category', ['uses' => 'AdminController@createCategory']);
	    Route::get('logout', 'AdminController@logout');
	    Route::get('add/product/{id}', 'AdminController@addProduct');
	    Route::get('del/product/{id}', 'AdminController@delProduct');
	    Route::get('del/pendingProduct/{id}', 'AdminController@delPendingProduct');

	    Route::get('/products', 'AdminController@product');
	    Route::post('/products', ['uses' => 'AdminController@searchProduct']);

	});
});


Route::get('/', function() {
    return view('users.index');
});

Route::get('redirect', ['uses' => 'SocialAuthController@redirect']);

Route::get('callback', ['uses' => 'SocialAuthController@callback']);

Route::group(['middleware' => 'guest'], function() {
	Route::match(['get', 'post'], '/users/login', ['uses' => 'UserController@login']);
	Route::match(['get', 'post'], '/users/signup', ['uses' => 'UserController@signup']);    
});

Route::match(['get', 'post'], '/search', ['uses' => 'UserController@searchProductOrService']);
Route::get('/product/add_product', ['uses' => 'ProductController@product']);
Route::get('/service/add_service', ['uses' => 'ServiceController@service']);



Route::group(['middleware' => 'auth'], function() {
		Route::group(['prefix' => 'product'], function() {
		Route::get('/each_product/{id}', ['uses' => 'ProductController@each_product']);
		Route::match(['get', 'post'], '/review/{product_id}', ['uses' => 'ReviewsController@productReview']);
		Route::post('/add_product', ['uses' => 'ProductController@product']);
		});
		
		Route::post('/service/add_service', ['uses' => 'ServiceController@service']);   
		Route::get('/logout', ['uses' => 'UserController@logout']);
});





