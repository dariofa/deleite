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




Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes

	//Administracion de users
    Route::post('users/store',[
	'uses' => 'UsersController@store',
	'as'=>'admin.users.store'
	]);


	//Administracion de productos bodega
	Route::get('bodega/producto/','ProductosBodegaController@index');
	Route::get('bodega/producto/crear','ProductosBodegaController@create');
	Route::get('bodega/producto/edit/{id}','ProductosBodegaController@edit');
	Route::get('bodega/producto/delete/{id}','ProductosBodegaController@delete');
	Route::post('bodega/producto/store',[
	'uses' => 'ProductosBodegaController@store',
	'as'=>'admin.bodega.producto.store'
	]);
	Route::post('bodega/producto/stock/update',[
	'uses' => 'ProductosBodegaController@stockUpdate',
	'as'=>'admin.bodega.producto.stock.update'
	]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');