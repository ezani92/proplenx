<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class EformController extends Controller
{
    public function authorizationToSell()
    {
    	return view('negotiator.eform.authorization');
    }

    public function CreateauthorizationToSell(Request $request)
    {
    	$input = $request->all();

    	$pdf = PDF::loadView('pdf.authorization',compact('input'))->setOptions([
    		'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ]);
        return $pdf->stream('authorization-to-sell.pdf');
    }

    public function offerToPurchase()
    {
    	return view('negotiator.eform.purchase');
    }

    public function CreateofferToPurchase(Request $request)
    {
    	$input = $request->all();

    	$pdf = PDF::loadView('pdf.purchase',compact('input'))->setOptions([
    		'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ]);
        return $pdf->stream('offer-to-purchase.pdf');
    }

    public function offerToRent()
    {
    	return view('negotiator.eform.rent');
    }

    public function CreateofferToRent(Request $request)
    {
    	$input = $request->all();

    	$pdf = PDF::loadView('pdf.rent',compact('input'))->setOptions([
    		'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ]);
        return $pdf->stream('offer-to-rent.pdf');
    }
}
