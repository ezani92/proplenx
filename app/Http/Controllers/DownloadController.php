<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Submission;

class DownloadController extends Controller
{
    public function CoagentInvoice(Request $request,$submission_id)
    {
    	$input = $request->all();

    	$submission = Submission::find($submission_id);

    	$pdf = PDF::loadView('pdf.coagent',compact('submission'))->setOptions([
    		'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ]);
        return $pdf->stream('coagent-invoice.pdf');
    }

    public function CommisionInvoice(Request $request,$submission_id)
    {
    	$input = $request->all();

    	$submission = Submission::find($submission_id);

    	$pdf = PDF::loadView('pdf.commission',compact('submission'))->setOptions([
    		'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ]);
        return $pdf->stream('commission-invoice.pdf');
    }

    public function PaymentVoucher(Request $request,$submission_id)
    {
        $input = $request->all();

        $submission = Submission::find($submission_id);

        $pdf = PDF::loadView('pdf.payment',compact('submission'))->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ]);
        return $pdf->stream('payment-voucher.pdf');
    }

    public function StampDuty(Request $request,$submission_id)
    {
        $input = $request->all();

        $submission = Submission::find($submission_id);

        $pdf = PDF::loadView('pdf.stamp',compact('submission'))->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ]);
        return $pdf->stream('stamp-duty.pdf');
    }

    public function OfficialReceipt(Request $request,$submission_id)
    {
        $input = $request->all();

        $submission = Submission::find($submission_id);

        $pdf = PDF::loadView('pdf.official',compact('submission'))->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ]);
        return $pdf->stream('official-receipt.pdf');
    }
}
