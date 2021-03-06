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

 Route::post('users/store',[
	'uses' => 'UsersController@store',
	'as'=>'admin.users.store'
	]);


Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes

	//Administracion de users
   


	//Administracion de productos bodega
	Route::get('bodega/producto/','ProductosBodegaController@index');
	Route::get('bodega/producto/crear','ProductosBodegaController@create');
	Route::get('bodega/producto/edit/{id}','ProductosBodegaController@edit');
	Route::get('bodega/producto/delete/{id}','ProductosBodegaController@destroy');
	Route::post('bodega/producto/store',[
	'uses' => 'ProductosBodegaController@store',
	'as'=>'admin.bodega.producto.store'
	]);
	Route::post('bodega/producto/update/{id}',[
	'uses' => 'ProductosBodegaController@update',
	'as'=>'admin.bodega.producto.update'
	]);
	Route::post('bodega/producto/stock/update',[
	'uses' => 'ProductosBodegaController@stockUpdate',
	'as'=>'admin.bodega.producto.stock.update'
	]);
	Route::post('bodega/producto/search','ProductosBodegaController@search');

	//Administracion de recetas
	Route::get('/recetas/','RecetasController@index');
	Route::get('/recetas/create','RecetasController@create');
	Route::get('/recetas/delete/{id}','RecetasController@destroy');
	Route::get('/recetas/edit/{id}','RecetasController@edit');
	Route::get('/recetas/producto/delete/{id_rec}/{id_pro}','RecetasController@prodDelete');
	Route::post('recetas/store',[
	'uses' => 'RecetasController@store',
	'as'=>'admin.recetas.store'
	]);
	Route::post('recetas/update/{id}',[
	'uses' => 'RecetasController@update',
	'as'=>'admin.recetas.update'
	]);
	Route::post('/receta/producto/update',[
	'uses' => 'RecetasController@productUpdate',
	'as'=>'admin.recetas.product.update'
	]);
	Route::post('/receta/producto/add',[
	'uses' => 'RecetasController@productAdd',
	'as'=>'admin.recetas.product.add'
	]);

});

///

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
