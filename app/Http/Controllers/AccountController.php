<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        if(Auth::user()->role == 1)
        {
            $user = User::find(Auth::user()->id);

            return view('admin.account.edit',['user' => $user]);
        }
        else if(Auth::user()->role == 2)
        {

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->all();

        $user = User::find($input['user_id']);

        if($input['password'] == null)
        {

        }
        else
        {
            if($input['password'] != $input['confirm_password'])
            {
                Session::flash('message', 'New password not match! Please enter again.'); 
                Session::flash('alert-class', 'alert-warning');

                return redirect('admin/account');
            }

            $user->password  = bcrypt($input['password']);
        }

        $user->name  = $input['fullname'];
        $user->email  = $input['email'];

        $user->save();

        Session::flash('message', 'Account successfully updated!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('admin/account');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
