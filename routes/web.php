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
            return redirect('/negotiator');
        }
	}
    
});

Auth::routes();

Route::middleware(['isadmin'])->group(function () {
    
    Route::get('/admin', 'DashboardController@index');

    Route::get('/admin/account', 'AccountController@edit');
    Route::post('/admin/account', 'AccountController@update');

    Route::get('/admin/user', 'UserController@index');
    Route::get('admin/user-data', 'UserController@data');
    Route::get('/admin/user/create', 'UserController@create');
    Route::post('/admin/user', 'UserController@store');
    Route::get('/admin/user/{user_id}', 'UserController@show');
    Route::get('/admin/user/{user_id}/edit', 'UserController@edit');
    Route::put('/admin/user/{user_id}', 'UserController@update');
    Route::get('/admin/user/{user_id}/deactivated', 'UserController@deactivated');
    Route::get('/admin/user/{user_id}/activated', 'UserController@activated');
    Route::get('/admin/user/{user_id}/delete', 'UserController@destroy');

    Route::get('/admin/annoucement', 'AnnoucementController@index');
    Route::post('/admin/annoucement', 'AnnoucementController@store');
});

Route::middleware(['isnegotiator'])->group(function () {
    
    Route::get('/negotiator', 'DashboardController@index');

    Route::get('/negotiator/submission/create', 'SubmissionController@create');
    
});

Route::post('api/notification/read/{notification_id}', 'ApiController@notificationRead');