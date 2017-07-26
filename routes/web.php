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


Route::get('/','home@home');
Route::post('/','home@home');

Route::get('/admin','admin@adhome');
Route::post('/admin','admin@adhome');

Route::post('/gettype','ajax@gettype');
Route::post('/change','ajax@change');

Route::post('/getcat','ajax@getcat');
Route::post('/getfilm','ajax@getfilm');

Route::get('/film/{id}','home@cat');
Route::get('/datials/{id}','home@datials');

Route::get('/chain/{id}','home@chain');
Route::get('/searchyear/{year}','search@searchyear');
Route::get('/searchtype/{type}','search@searchtype');

Route::get('/searchquality/{quality}','search@searchquality');
Route::post('/searchtype/{quality}','search@searchtype');

Route::get('/home','search@searchname');
Route::post('/home','search@searchname');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
