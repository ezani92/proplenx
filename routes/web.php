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

	if(Auth::guest())
	{
		return view('auth.login');
	}
	else
	{
		if (Auth::user()->role == '1')
        {
            return redirect('/admin');
        }
        else
        {
            return redirect('/agent');
        }
	}
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['isadmin'])->group(function () {
    
    Route::get('/admin', 'DashboardController@index');
    
});

Route::middleware(['isagent'])->group(function () {
    
    Route::get('/agent', function () {
	    return 'agent';
	});
    
});