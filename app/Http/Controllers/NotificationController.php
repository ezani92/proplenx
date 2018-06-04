<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class NotificationController extends Controller
{
    
    public function index()
    {
        $user = \Auth::user();

        return view('admin.notification.index',compact('user'));
    }

    public function delete($id)
    {
        $user = \Auth::user();
        $notification = $user->notifications()->where('id',$id)->first();
        if ($notification)
        {
            $notification->markAsRead();
            return back();
        }
        else
        {
            Session::flash('message', 'We could not found the specified notification!'); 
            Session::flash('alert-class', 'alert-danger');

            return back();
        }
    }
}
