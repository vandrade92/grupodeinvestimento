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

Route::get('/', ['uses'=> 'Controller@homepage']);
Route::get('/cadastro', ['uses'=> 'Controller@cadastrar']);

/*
* Routes to user auth
* =============================================================================
*/
Route::get('/login', ['uses'=> 'Controller@fazerLogin']);
Route::post('/login', ['as' => 'user.login','uses' => 'DashboardController@auth']);
Route::get('/dashboard', ['as' => 'user.dashboard','uses' => 'DashboardController@index']);
Route::get('user/moviment', ['as' => 'moviment.index', 'uses' => 'MovimentsController@index']);
Route::get('moviment', ['as' => 'moviment.application', 'uses' => 'MovimentsController@application']);
Route::post('moviment',['as' => 'moviment.application.store', 'uses' => 'MovimentsController@storeApplication']);
Route::get('moviment/all', ['as' => 'moviment.all', 'uses' => 'MovimentsController@all']);

Route::resource('user', 'UsersController');
Route::resource('instituitions', 'InstituitionsController');
Route::resource('group', 'GroupsController');
Route::resource('instituition.product', 'ProductsController');




Route::post('group/{group_id}/user', ['as' => 'group.user.store', 'uses' => 'GroupsController@userStore']);
