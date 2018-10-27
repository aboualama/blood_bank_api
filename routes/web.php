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
 
Route::get('/', function () { return view('welcome'); });

Auth::routes(); 

Route::group(['middleware' => 'auth'] , function(){
	
	Route::group(['prefix' => 'dashboard' , 'namespace' => 'Admin'] , function(){
 
		Route::get('/', function () { return view('admin.dashboard'); });

		Route::get('/user', 'UserController@index'); 
		Route::get('/user/logout', 'UserController@logout'); 


		Route::resource('/Governorate', 'GovernorateController');
		Route::resource('/City', 'CityController');
		Route::resource('/Category', 'CategoryController');
		Route::resource('/Post', 'PostController');
		Route::resource('/Client', 'ClientController');
		Route::post('/Client/active/{id}', 'ClientController@active');
			


		Route::get('/Settings', 'SettingsController@edit');
		Route::put('/Settings/edit', 'SettingsController@update');  

	});
});