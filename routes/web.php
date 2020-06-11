<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'user', 'namespace' => 'User', 'middleware' => ['auth', 'user'], 'as' => 'users.'], function () {
    Route::get('dashboard', 'ProjectController@index')->name('dashboard');
    Route::resource('projects', 'ProjectController');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin'], 'as' => 'admin.'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('sectors', 'SectorController');
    Route::resource('projects', 'ProjectController');
});
