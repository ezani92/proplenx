<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function notificationRead($notificationID)
    {
    	
    	$user = \Auth::user();

    	$notification = $user->notifications()->where('id',$notificationID)->update(['read_at' => now()]);

    	return response('OK', 200)->header('Content-Type', 'text/plain');

    }
}
