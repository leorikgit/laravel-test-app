<?php

use App\Postcard;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

//// FACADES ////
Route::get('/postcard', function(){

    $postcardSendingService = new \App\PostcardSendingService('pl', 4,6);
    $postcardSendingService->hello('Test message', 'michalwrona.dev@gmail.com');
});

Route::get('facades', function (){
   Postcard::hello('message', 'email');
});

Route::get('/macro', function(){
    return Str::partNumber('lala');
});
Route::get('/mixins', function(){
    return Str::prefix('lala'. 'aa');
});

Route::get('/pipeline', 'PostController@pipeline');

//// repositories pattern
Route::get('/customers', 'CustomerController@index');
Route::get('/customers/{id}', 'CustomerController@show');
Route::get('/customers/{id}/update', 'CustomerController@update');
Route::get('/customers/{id}/delete', 'CustomerController@destroy');
