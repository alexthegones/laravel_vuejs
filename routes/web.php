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
Route::get('/tasks/{query?}', 'TaskController@index');
Route::post('/tasks', 'TaskController@store');
Route::get('/tasks/edit/{id}', 'TaskController@edit');
Route::patch('/tasks/update/{id}', 'TaskController@update');
Route::delete('/tasks/delete/{id}', 'TaskController@destroy');
