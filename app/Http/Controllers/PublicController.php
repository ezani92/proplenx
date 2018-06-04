<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function ban()
    {
    	return view('public.ban');
    }
}
