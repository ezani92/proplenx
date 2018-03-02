<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
    	$role = Auth::user()->role;

    	if($role == 1)
    	{
			return view('admin.dashboard');
    	}
    	else if($role == 2)
    	{
    		return view('negotiator.dashboard');
    	}
    }
}
