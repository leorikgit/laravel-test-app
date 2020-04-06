<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/pay/','PayOrderController@store');

Route::get('/viewComposer/','ChannelController@index');
Route::get('post/create', 'PostController@create');



//// RELATIONS ////
Route::get('/relationships/OneToOne', 'UserController@index');
Route::get('/relationships/oneToMany', 'UserController@oneToMany');
Route::get('/relationships/manyToMany', 'UserController@manyToMany');

Route::get('relationships/pOneToOne', 'UserController@pOneToOne');
Route::get('relationships/pOneToMany', 'UserController@pOneToMany');
Route::get('relationships/pManyToMany', 'PostController@pManyToMany');
