<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Submission;

class DashboardController extends Controller
{
    public function index()
    {
    	$role = Auth::user()->role;

        $agent = User::where('role',2)->count();
        $active_agent = User::where('role',2)->where('is_active',1)->count();
        $not_active_agent = User::where('role',2)->where('is_active',0)->count();

        $submission = Submission::all()->count();
        $paid_submission = Submission::where('status',11)->count();
        $pending_submission = Submission::where('status','>',1)->where('status','<=',5)->count();

    	if($role == 1)
    	{
			return view('admin.dashboard',compact('agent','active_agent','not_active_agent','submission','paid_submission','pending_submission'));
    	}
    	else if($role == 2)
    	{
    		return view('negotiator.dashboard');
    	}
    }
}
