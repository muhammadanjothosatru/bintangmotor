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
    return view('layouts/sidebar');
});

Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');
// Route::get('register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:adminlamongan']], function () {
        Route::get('adminLamongan', 'App\Http\Controllers\AdminController@adminLamongan')->name('adminLamongan');
    });
    Route::group(['middleware' => ['cek_login:adminbabat']], function () {
        Route::get('adminBabat', 'App\Http\Controllers\AdminController@adminBabat')->name('adminBabat');
    });
});