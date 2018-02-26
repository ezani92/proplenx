<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use DataTables;
use DB;
use Carbon\Carbon;
use App\User;
use Session;
use Mail;
use App\Mail\NewNegotiator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        return view('admin.user.index');
    }

    public function data(Datatables $datatables)
    {
        $users = User::where('role',2)->get();

        return Datatables::of($users)
            ->addColumn('actions', function($user) {
                return view('admin.user.action', compact('user'))->render();
            })
            ->editColumn('created_at', function ($user) {
                return $user->created_at ? with(new Carbon($user->created_at))->format('d M Y, h:i A') : '';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $temp_pass = time();

        $user = new User;

        $user->name = $input['fullname'];
        $user->email = $input['email'];
        $user->nric = $input['nric'];
        $user->phone = $input['phone_no'];
        $user->gender = $input['gender'];
        $user->full_address = $input['address'];
        $user->commision_rate = $input['commission_rate'];
        $user->bank_name = $input['bank_acc_no'];
        $user->bank_account_no = $input['bank_name'];

        $user->role = 2;
        $user->password = bcrypt($temp_pass);

        if($user->save())
        {
            $user_id = $user->id;
            $user = User::find($user_id);
            $user->agent_code = $user->generateID($user_id);

            $user->save();

            Mail::to($user)->send(new NewNegotiator($user,$temp_pass));

            Session::flash('message', 'New Account Successfully Created! An email has been sent to new negotiator.'); 
            Session::flash('alert-class', 'alert-success');
        }
        else
        {
            Session::flash('message', 'Error While Creating New Account!'); 
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect('admin/user');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('admin.user.show',[
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.user.edit',[
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $user = User::find($id);

        $user->name = $input['fullname'];
        $user->email = $input['email'];
        $user->nric = $input['nric'];
        $user->phone = $input['phone_no'];
        $user->gender = $input['gender'];
        $user->full_address = $input['address'];
        $user->commision_rate = $input['commission_rate'];
        $user->bank_name = $input['bank_acc_no'];
        $user->bank_account_no = $input['bank_name'];

        if($user->save())
        {
            Session::flash('message', 'Account details succesfuly updated.'); 
            Session::flash('alert-class', 'alert-success');
        }
        else
        {
            Session::flash('message', 'Error While Updating Account!'); 
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect('admin/user/'.$user->id);
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

    public function deactivated($id)
    {
        $user = User::find($id);
        $user->is_active = 0;
        $user->save();

        Session::flash('message', 'Account successfuly deactivated. This negotiator was not able to login.'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('admin/user/'.$user->id);
    }

    public function activated($id)
    {
        $user = User::find($id);
        $user->is_active = 1;
        $user->save();

        Session::flash('message', 'Account successfuly deactivated. This negotiator was able to login again.'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('admin/user/'.$user->id);
    }
}
