<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use Carbon\Carbon;
use App\Submission;
use Excel;

class ReportController extends Controller
{   
    public function admin(Request $request)
    {
        $input = $request->all();

        $role = \Auth::user()->role;

        if(isset($input['date_from']))
        {
            $arrStart = explode("-", $input['date_from']);
            $arrEnd = explode("-", $input['date_to']);
            $from = Carbon::create($arrStart[2], $arrStart[1], $arrStart[0], 0, 0, 0);
            $to = Carbon::create($arrEnd[2], $arrEnd[1], $arrEnd[0], 23, 59, 59);

            $submissions = Submission::where('created_at','>=',$from)->where('created_at','<=',$to)->paginate(10);


        }
        else
        {
            $submissions = Submission::paginate(10);
        }

        return view('admin.report.index',[
            'submissions' => $submissions
        ]);
    }

    public function negotiator(Request $request)
    {
        $input = $request->all();

    	$role = \Auth::user()->role;

        if(isset($input['date_from']))
        {
            $arrStart = explode("-", $input['date_from']);
            $arrEnd = explode("-", $input['date_to']);
            $from = Carbon::create($arrStart[2], $arrStart[1], $arrStart[0], 0, 0, 0);
            $to = Carbon::create($arrEnd[2], $arrEnd[1], $arrEnd[0], 23, 59, 59);

            $submissions = Submission::where('created_at','>=',$from)->where('created_at','<=',$to)->paginate(10);


        }
        else
        {
            $submissions = Submission::paginate(10);
        }

        return view('negotiator.report.index',[
            'submissions' => $submissions
        ]);
    }

    public function exportNegotiator(Request $request)
    {
        

        $submissions = Submission::all();

        // Initialize the array which will be passed into the Excel
        // generator.
        $orderArray = []; 

        // Define the Excel spreadsheet headers
        $orderArray[] = ['Date','Form Code','Customer Name','Address','Rental Expiry Date','Nego Name','Bank In Amount','   Professional Fees', 'Nego Incentive'];

        // Convert each member of the returned collection into an array,
        // and append it to the payments array.
        foreach ($submissions as $submission) {

            $date = $submission->created_at->format('d M Y');
            $form_code = $submission->form_code;
            $customer_name = $submission->landlord_vendor_name;
            $address = $submission->property_address;
            $rent_exp_date = $submission->rental_expiry_date;
            $nego_name = $submission->user->name;
            $bank_in_amount = $submission->amount_bank_in_to_proplex;
            $pro_fee = $submission->pro_fee;
            $nego_incentive = $submission->negotiator_commision;
            

            $tempArray = array($date,$form_code,$customer_name,$address,$rent_exp_date,$nego_name,$bank_in_amount,$pro_fee,$nego_incentive);          



            $orderArray[] = $tempArray;

        }

        

        Excel::create('Proplenx')
        ->sheet('sheet1', function($sheet) use ($orderArray) {
                $sheet->fromArray($orderArray, null, 'A1', false, false);
                $sheet->row(1, function($row) {
                    $row->setBackground('#eeeeee');
                });
            })           
        ->export('xls');
    }

    public function exportAdmin(Request $request)
    {
        

        $submissions = Submission::all();

        // Initialize the array which will be passed into the Excel
        // generator.
        $orderArray = []; 

        // Define the Excel spreadsheet headers
        $orderArray[] = ['Date','Form Code','Customer Name','Address','Rental Expiry Date','Nego Name','Bank In Amount','   Professional Fees', 'Nego Incentive'];

        // Convert each member of the returned collection into an array,
        // and append it to the payments array.
        foreach ($submissions as $submission) {

            $date = $submission->created_at->format('d M Y');
            $form_code = $submission->form_code;
            $customer_name = $submission->landlord_vendor_name;
            $address = $submission->property_address;
            $rent_exp_date = $submission->rental_expiry_date;
            $nego_name = $submission->user->name;
            $bank_in_amount = $submission->amount_bank_in_to_proplex;
            $pro_fee = $submission->pro_fee;
            $nego_incentive = $submission->negotiator_commision;
            

            $tempArray = array($date,$form_code,$customer_name,$address,$rent_exp_date,$nego_name,$bank_in_amount,$pro_fee,$nego_incentive);          



            $orderArray[] = $tempArray;

        }

        

        Excel::create('Proplenx')
        ->sheet('sheet1', function($sheet) use ($orderArray) {
                $sheet->fromArray($orderArray, null, 'A1', false, false);
                $sheet->row(1, function($row) {
                    $row->setBackground('#eeeeee');
                });
            })           
        ->export('xls');
    }
}
