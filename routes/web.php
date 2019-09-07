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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view('admin/googleLogin');
});

Route::get('/account/{id}', 'Auth\LoginController@userAccount');
Route::post('/account/update', 'Auth\LoginController@updateAccount');
Route::post('/logout','Auth\LoginController@userLogout')->name('logout');
//Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');


Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

