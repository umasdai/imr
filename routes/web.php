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

use App\Http\Controllers;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('auth.home');
});

Route::get('/lists', 'TaskController@index');
Route::get('/staff', 'TaskController@staff');

// Route::get('/home', function () {
//     return view('task.list');
// });


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
