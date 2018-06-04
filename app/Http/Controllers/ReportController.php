<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Submission;

class ReportController extends Controller
{
    public function index(Request $request)
    {
    	$input = $request->all();

    	if(!isset($input['year']))
    	{
    		$year = '2018';
    	}
    	else
    	{
    		$year = $input['year'];
    	}

    	$chart = Charts::database(Submission::all(), 'line', 'highcharts')
    		->oneColor(true,'#CBA123')
    	 	->title("Total New Submission By Monthly For Year ".$year)
		    ->elementLabel("Submission")
		    ->responsive(true)
			->groupByMonth($year,'true');
    	
		    

    	return view('admin.report.index', ['chart' => $chart]);
    }
}
