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
//Route::get('/products', 'ProductController@index')->name('products.list');
//Route::get('/products/{id}', 'ProductController@show')->name('products.show');
// Route::resource('products','ProductController');
//Route::get('products/{id}','ProductController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware('web')->group(function (): void{
	Route::group(['prefix' => 'products'], function (): void{
		Route::get('/', 'ProductController@index');
		Route::get('/create','ProductController@create');		
		Route::post('/create','ProductController@store');
		Route::get('/edit/{id}','ProductController@edit');
		Route::post('/edit/{id}','ProductController@update');
		Route::delete('/{id}','ProductController@destroy');
		Route::get('/{id}','ProductController@show');
		
	});
});

Route::resource('categories', 'CategoryController');
