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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['isadmin'])->group(function () {
    
    Route::get('/admin', function () {
	    return 'admin';
	});
    
});

Route::middleware(['isagent'])->group(function () {
    
    Route::get('/agent', function () {
	    return 'agent';
	});
    
});