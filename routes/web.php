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

//Public Route

Route::get('/ban', 'PublicController@ban');

//End Public Route

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
    Route::get('/admin/user/{user_id}/resetpassword', 'UserController@ResetPassword');
    Route::put('/admin/user/{user_id}', 'UserController@update');
    Route::get('/admin/user/{user_id}/deactivated', 'UserController@deactivated');
    Route::get('/admin/user/{user_id}/activated', 'UserController@activated');
    Route::get('/admin/user/{user_id}/delete', 'UserController@destroy');

    Route::get('/admin/submission', 'SubmissionController@index');
    Route::get('/admin/submission/data', 'SubmissionController@dataAdmin');
    Route::get('/admin/submission/{submission_id}', 'SubmissionController@show');
    Route::post('/admin/submission/status', 'SubmissionController@update');

    Route::get('/admin/report', 'ReportController@admin');
    Route::get('/admin/report/export', 'ReportController@exportAdmin');

    Route::get('/admin/notification', 'NotificationController@index');
    Route::get('/admin/notification/{notification_id}/mark-read', 'NotificationController@delete');

    Route::get('/admin/annoucement', 'AnnoucementController@index');
    Route::post('/admin/annoucement', 'AnnoucementController@store');
});

Route::middleware(['isnegotiator','isactive'])->group(function () {
    
    Route::get('/negotiator', 'DashboardController@index');

    Route::get('/negotiator/submission/create', 'SubmissionController@create');
    Route::get('/negotiator/submission', 'SubmissionController@index');
    Route::get('/negotiator/submission/data', 'SubmissionController@dataNegotiator');
    Route::post('/negotiator/submission', 'SubmissionController@store');
    Route::get('/negotiator/submission/{submission_id}', 'SubmissionController@show');

    Route::get('/negotiator/report', 'ReportController@negotiator');
    Route::get('/negotiator/report/export', 'ReportController@exportNegotiator');
    
});

Route::post('api/notification/read/{notification_id}', 'ApiController@notificationRead');