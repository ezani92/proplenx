<?php

namespace App\Http\Controllers;

use App\Submission;
use App\User;
use App\Document;
use Auth;
use Session;
use Illuminate\Http\Request;
use App\Notifications\SubmissionNew;
use DataTables;
use Carbon\Carbon;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('negotiator.submission.index');
    }

    public function data(Datatables $datatables)
    {
        $submissions = Submission::All();
        return Datatables::of($submissions)
            ->editColumn('status', function ($submission) {
                
                if($submission->status == 1)
                {
                    return '<span class="label label-default">Pending / Outstanding</span>';
                }
                else if($submission->status == 2)
                {
                    return '<span class="label label-default">CoNegotiator Invoice</span>';
                }
                else if($submission->status == 3)
                {
                    return '<span class="label label-default">CoAgency Payment</span>';
                }
                else if($submission->status == 4)
                {
                    return '<span class="label label-default">Referral Invoice</span>';
                }
                else if($submission->status == 5)
                {
                    return '<span class="label label-default">Bank-in Slip</span>';
                }
                else if($submission->status == 6)
                {
                    return '<span class="label label-default">Payment from Landlord</span>';
                }
                else if($submission->status == 7)
                {
                    return '<span class="label label-default">Negotiator Refer Remark </span>';
                }
                else if($submission->status == 8)
                {
                    return '<span class="label label-default">Admin Refer Remark</span>';
                }
                else if($submission->status == 9)
                {
                    return '<span class="label label-danger">Aborted</span>';
                }
                else if($submission->status == 10)
                {
                    return '<span class="label label-default">Ready for Commission Payment</span>';
                }
                else if($submission->status == 11)
                {
                    return '<span class="label label-success">Paid</span>';
                }
                else if($submission->status == 12)
                {
                    return '<span class="label label-default">Admin to Issue Invoice &/or Receipt </span>';
                }

            })
            ->addColumn('actions', function($submission) {
                return view('negotiator.submission.action', compact('submission'))->render();
            })
            ->editColumn('created_at', function ($submission) {
                return $submission->created_at ? with(new Carbon($submission->created_at))->format('d M Y, h:i A') : '';
            })
            ->rawColumns(['actions','status'])
            ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('negotiator.submission.create',[
            'users' => $users
        ]);
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

        $submission = new Submission;

        $submission->user_id = Auth::user()->id;
        $submission->submission_type = $input['submission_type'];
        $submission->co_agency = $input['co_agency'];
        $submission->status = $input['status'];
        $submission->form_code = $input['form_code'];
        $submission->rental_expiry_date = $input['rental_expiry_date'];
        $submission->property_address = $input['property_address'];
        $submission->selling_rental_price = $input['selling_rental_price'];
        $submission->amount_bank_in_to_proplex = $input['amount_bank_in_to_proplex'];
        $submission->pro_fee = $input['pro_fee'];
        $submission->pro_fee_gst = $input['pro_fee_gst'];
        $submission->gst_by_landlord_vendor = $input['gst_by_landlord_vendor'];
        $submission->amount_to_invoice_landlord = $input['amount_to_invoice_landlord'];
        $submission->stamp_duty = $input['stamp_duty'];
        $submission->negotiator_commision = $input['negotiator_commision'];
        $submission->balance_due_landlord_vendor = $input['balance_due_landlord_vendor'];
        $submission->amount_payable_to_negotiator = $input['amount_payable_to_negotiator'];
        $submission->balance = $input['balance'];

        $submission->landlord_vendor_name = $input['landlord_vendor_name'];
        $submission->landlord_vendor_ic_no = $input['landlord_vendor_ic_no'];
        $submission->landlord_vendor_address = $input['landlord_vendor_address'];
        $submission->landlord_vendor_bank_name = $input['landlord_vendor_bank_name'];
        $submission->landlord_vendor_acc_no = $input['landlord_vendor_acc_no'];

        $submission->tennant_purchaser_name = $input['tennant_purchaser_name'];
        $submission->tennant_purchaser_ic_no = $input['tennant_purchaser_ic_no'];
        $submission->tennant_purchaser_address = $input['tennant_purchaser_address'];
        $submission->tennant_purchaser_bank_name = $input['tennant_purchaser_bank_name'];
        $submission->tennant_purchaser_acc_no = $input['tennant_purchaser_acc_no'];

        if($input['co_agency'] == 2)
        {
            $submission->coagent_id = $input['coagent_id'];
            $submission->coagent_portion_type = $input['coagent_portion_type'];
            $submission->coagent_portion_value = $input['coagent_portion_value'];
            $submission->coagent_gst_by_landlord = $input['coagent_gst_by_landlord'];
        }

        else if($input['co_agency'] == 3)
        {
            $submission->coagent_company_name = $input['coagent_company_name'];
            $submission->coagent_company_portion_type = $input['coagent_company_portion_type'];
            $submission->coagent_company_portion_value = $input['coagent_company_portion_value'];
            $submission->coagent_company_bank_name = $input['coagent_company_bank_name'];
            $submission->coagent_company_bank_acc_no = $input['coagent_company_bank_acc_no'];
            $submission->total_payable_to_coagent = $input['total_payable_to_coagent'];
        }

        else if($input['co_agency'] == 4)
        {
            $submission->coagent_company_name_2 = $input['coagent_company_name_2'];
            $submission->proplenx_portion_type_2 = $input['proplenx_portion_type_2'];
            $submission->proplenx_portion_value_2 = $input['proplenx_portion_value_2'];
            $submission->coagent_company_bank_name_2 = $input['coagent_company_bank_name_2'];
            $submission->coagent_company_bank_acc_no_2 = $input['coagent_company_bank_acc_no_2'];
            $submission->total_payable_to_coagent_2 = $input['total_payable_to_coagent_2'];
        }

        else if($input['co_agency'] == 5)
        {
            $submission->internal_referrel_name = $input['internal_referrel_name'];
            $submission->internal_referrel_bankname = $input['internal_referrel_bankname'];
            $submission->internal_referrel_bankacc = $input['internal_referrel_bankacc'];
            $submission->internal_referrel_portion_type = $input['internal_referrel_portion_type'];
            $submission->internal_referrel_portion_value = $input['internal_referrel_portion_value'];
            $submission->internal_referrel_gst = $input['internal_referrel_gst'];
            $submission->internal_referrel_total_paid = $input['internal_referrel_total_paid'];
        }

        else if($input['co_agency'] == 6)
        {
            $submission->external_referrel_name = $input['external_referrel_name'];
            $submission->external_referrel_bankname = $input['external_referrel_bankname'];
            $submission->external_referrel_bankacc = $input['external_referrel_bankacc'];
            $submission->external_referrel_portion_type = $input['external_referrel_portion_type'];
            $submission->external_referrel_portion_value = $input['external_referrel_portion_value'];
            $submission->external_referrel_gst = $input['external_referrel_gst'];
            $submission->external_referrel_total_paid = $input['external_referrel_total_paid'];
        }

        $submission->save();

        if ($request->hasFile('documents'))
        {

            foreach ($request->documents as $document)
            {
                $filename = $document->store('documents');
                $original_name = $document->getClientOriginalName();
                
                Document::create([
                    'submission_id' => $submission->id,
                    'original_name' => $original_name,
                    'filename' => $filename
                ]);
            }

        }

        $negotiator = User::find(\Auth::user()->id);

        $admin = User::find(1);
        $admin->notify(new SubmissionNew($negotiator));

        Session::flash('message', 'Submission succesfully saved!'); 
        Session::flash('alert-class', 'alert-success');

        return redirect('negotiator/submission');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function show(Submission $submission,$submission_id)
    {
        $submission = Submission::find($submission_id);

        return view('negotiator.submission.show',compact('submission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function edit(Submission $submission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Submission $submission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submission $submission)
    {
        //
    }
}
