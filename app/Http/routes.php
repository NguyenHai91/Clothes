<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'IndexController@index');
Route::get('index', 'IndexController@index');
Route::get('products/category/{cate}', 'IndexController@getProductInCategory');
Route::get('products/bestseller', 'IndexController@getProductBestSeller');
Route::get('products/men', 'IndexController@getProductMen');
Route::get('products/women', 'IndexController@getProductWomen');
Route::get('products/search/{txtSearch}', 'IndexController@getProductSearch');
Route::post('products/search', 'IndexController@postProductSearch');

Route::get('brand/{brandname}', 'IndexController@getProductInBrand');
Route::get('product_detail/{id}', 'IndexController@getProductDetail');
Route::post('product_detail/{id}', 'IndexController@postProductDetail');
Route::get('product_detail/update/{id}', 'IndexController@updateProductDetail');
Route::get('product_detail/update_size/{id}', 'IndexController@updateProductSize');

Route::get('cart', 'IndexController@getCart');
Route::get('cart/delete/{rowid}', 'IndexController@deleteProductWithRowId');
Route::get('cart/update/{id}/{qty}', 'IndexController@updateCart');

Route::get('login', 'IndexController@getLogin');
Route::post('login', 'IndexController@postLogin');
Route::post('register', 'IndexController@postRegister');
Route::get('logout', 'IndexController@getLogout');

Route::get('checkout', 'IndexController@getCheckout');
Route::post('checkout', 'IndexController@postCheckout');
Route::get('success', 'IndexController@getSuccess');

Route::get('contact', 'IndexController@getContact');
Route::post('contact', 'IndexController@postContact');



Route::controllers([
	'auth'=>'Auth\AuthController',
	'password'=>'Auth\PasswordController'
]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function ()
{
	Route::auth();
	// Route::get('login', function ()
	// {
	// 	return view('admin.login');
	// });
	// Route::post('login', 'Auth\AuthController@postLogin');
	// Route::get('logout', 'Auth\AuthController@getLogout');
	Route::group(['prefix' => 'detail'], function ()
	{
		Route::get('list','ProductDetailController@getList');
		Route::get('add/{id}','ProductDetailController@getAdd');
		Route::post('add/{id}','ProductDetailController@postAdd');
		Route::get('edit/{id}','ProductDetailController@getEdit');
		Route::post('edit/{id}','ProductDetailController@postEdit');
	});

	Route::group(['prefix' => 'size'], function ()
	{
		Route::get('list', 'SizeController@getList');
		Route::get('add', 'SizeController@getAdd');
		Route::post('add', 'SizeController@postAdd');
	});

	Route::group(['prefix' => 'category'], function ()
	{
		Route::get('list','CategoryController@getList');

		Route::get('add','CategoryController@getAdd');
		Route::post('add','CategoryController@postAdd');
		
		Route::get('delete/{id}','CategoryController@getDelete');
		
		Route::get('edit/{id}','CategoryController@getEdit');
		Route::post('edit/{id}','CategoryController@postEdit');
	});
	Route::group(['prefix' => 'product'], function ()
	{
		Route::get('list','ProductController@getList');

		Route::get('add','ProductController@getAdd');
		Route::post('add','ProductController@postAdd');
		
		Route::get('delete/{id}','ProductController@getDelete');
		
		Route::get('edit/{id}','ProductController@getEdit');
		Route::post('edit/{id}','ProductController@postEdit');
	});
	Route::group(['prefix' => 'user'], function ()
	{
		Route::get('list','UserController@getList');

		Route::get('add','UserController@getAdd');
		Route::post('add','UserController@postAdd');
		
		Route::get('delete/{id}','UserController@getDelete');
		
		Route::get('edit/{id}','UserController@getEdit');
		Route::post('edit/{id}','UserController@postEdit');
	});
});
