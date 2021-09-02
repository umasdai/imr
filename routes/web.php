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
use App\Http\Controllers\TasksController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    // return view('auth.home');
    return view('auth.login');
});

Route::get('/login', function () {
    // return view('auth.home');
    return view('auth.login');
});

Route::get('/tasks', 'TasksController@index');
Route::get('/task/create', function () {
        return view('task.create');
    });
Route::post('/task/create/new', 'TasksController@create');
Route::get('/task/{id}', 'TasksController@show');
Route::get('/delete/{id}', 'TasksController@delete');
Route::get('logout', [LoginController::class, 'logout']);

// Route::get('/home', function () {
//     return view('home');
// });


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
