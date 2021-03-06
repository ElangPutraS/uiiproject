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

Route::view('/', 'landing-page');

Auth::routes([
    'verify' => true,
]);

Route::get('/login/google', 'Auth\GoogleController@redirect')->name('google.redirect');
Route::get('/login/google/callback', 'Auth\GoogleController@callback')->name('google.callback');

Route::get('/home', 'HomeController@index')->name('home');

Route::view('/coba', 'coba');
