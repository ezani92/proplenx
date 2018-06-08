<!DOCTYPE html>
<html lang="en">
   	<head>
    	<title>PropLenx Realty | Offer To Purchase</title>
     	<meta charset="utf-8">
     	<meta name="viewport" content="width=device-width, initial-scale=1">
     	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     	<style type="text/css">
     		
     		.header {
     			text-align: center;
     		}
     		.borderless tr td {
			    border: none !important;
			    padding: 0px !important;
			}
			.white {
				color: white;
			}
			.invoice-title h2, .invoice-title h3 {
			    display: inline-block;
			}
			.table > tbody > tr > .no-line {
			    border-top: none;
			}
			.table > thead > tr > .no-line {
			    border-bottom: none;
			}
			.table > tbody > tr > .thick-line {
			    border-top: 2px solid;
			}
			.red
			{
				color: red;
			}
			.green {
				color: green;
			}

			.underline
			{
				text-decoration: underline;
			}

			p {
				font-size: 9;
				text-align: justify;
    			text-justify: inter-word;
			}

			.no-indent {
			    padding-left:12px;
			}
     	</style>
   	</head>
   	<body>
    	<div class="container">
		    <div class="row">
		        <div class="col-xs-4 text-center">
					<img src="assets/img/proplenx.png" width="50%">
		    	</div>
		    	<div class="col-xs-4" style="font-size: 8;">
		        	Unit 8-3A Level 8 Menara K1, No. 1 Lorong 3/137C 
					Off Jalan Kelang Lama, 58000 Kuala Lumpur
					<br /><br />
					T (+6)016-2126193<br />
					E admin@proplenx.com<br />
					W www.proplenx.com
		    	</div>
		    	<div class="col-xs-4">
		        	<img src="assets/img/hartanah.png" width="35%">
		    	</div>
		    </div>
		    <hr style="color: black; border-top: 1px solid #000000;" />
		    <div class="row">
		    	<h5 class="text-center underline">OFFER TO PURCHASE</h5>
		    </div>
		    <br />
		    <div class="row">
		    	<div class="col-md-12">
		    		Property Address : <span class="underline">{{ $input['address'] }}</span><br />
		    		Build-Up&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Approximately <span class="underline">{{ $input['one'] }}</span> square feet/ others : <span class="underline">{{ $input['two'] }}</span><br />
		    		<br /><br />
		    		<p>
		    			The Purchaser(s) and/or Nominee(s) (“Purchaser”) hereby offer to purchase and the Vendor (s) and/or Nominee(s) (“Vendor”) hereby accepts the offer to purchase the above property on an “As Is Where Is Basis” with attached inventory (if any) subject to the following terms and conditions:
		    		</p>
		    		<br />
		    		<ol class="no-indent">
					    <li>
					        <p>
					            PURCHASE PRICE : RM<span class="underline">{{ $input['three'] }}</span>  *plus <span class="underline">{{ $input['four'] }}</span> % Goods & Services Tax (GST)
					        </p>
					    </li>
					    <br />
					    <li>
					        <p>
					            The Purchaser shall upon the signing of this Offer to Purchase, pay an Earnest Deposit of RM<span class="underline">{{ $input['five'] }}</span> (Cheque No. <span class="underline">{{ $input['six'] }}</span>/ Bank Transfer) to PROPLENX REALTY (CIMB Bank Bhd Client’s Account No. 8009198205), or <span class="underline">{{ $input['seven'] }}</span> as stakeholder upon the terms and conditions herein. 
					        </p>
					    </li>
					    <br />
					    <li>
					        <p>
					            <strong>APPOINTMENT</strong>
					            <br />
					            The Vendor hereby agrees to appoint and authorize PROPLENX REALTY to -
					        </p>
					        <ul>
					            <li>act on its behalf to sell the Property and shall pay to PROPLENX REALTY the Professional Fees plus GST in accordance with the Seventh Schedule of the Valuers, Appraisers and Estate Agents Act 1981 (“Schedule”), as agreed, due and payable immediately upon signing of the SPA, regardless of any subsequent abortion or termination of the SPA for whatsoever reason; 
					            </li>
					            <li>to hold the Earnest Deposit on its behalf as stakeholder and to deduct the Professional Fees from the Earnest Deposit collected when it is due and payable in accordance with the clause 3(a).
					        </ul>
					    </li>
					    <br /><br />
					    <li>
					        <p>
					            <strong>PAYMENT TERMS</strong>
					            <br />
					        </p>
					        <ul>
					            <li>10% of the Purchase Price less the Earnest Deposit shall be paid by the Purchaser upon the signing of the SPA; 
					            </li>
					            <li>The Purchaser shall settle the remaining 90% of the Purchase Price within 3 months from the date of SPA/Consent of the Developer / relevant authorities whichever is later, with an extension period of 30 days subject to an interest of 8% per annum on the Balance Sum calculated on the daily rest basis.
					        </ul>
					    </li>
					    <br /><br />
					    <li>
					        <p>
					            <strong>DEFAULT</strong>
					            <br />
					            The SPA must be signed by both parties within *15/ <span class="underline">{{ $input['eight'] }}</span> working days from the date of acceptance by the Vendors and/or receipt of Earnest Deposit (whichever is later). In default of signing the SPA within the stipulated period -
					        </p>
					        <ul>
					            <li>by the Purchaser, PROVIDED that there is no undue delay on the part of the Vendor or Vendor's Solicitors, then the Vendor shall be entitled to forfeit the Earnest Deposit paid as agreed liquidated damages, which shall be shared equally between the Vendor and PROPLENX REALTY;
					            </li>
					            <li>by the Vendor, PROVIDED that there is no undue delay on the part of the Purchaser or Purchaser's Solicitors, then the Vendor shall refund the Earnest Deposit to the Purchaser together with a compensation sum of equivalent amount which shall be shared equally between the Purchaser and PROPLENX REALTY, failing which the Purchaser shall be entitled to seek for specific performance at the cost and expense of the Vendor;</li>
					            <li>by both the Vendor and Purchaser on mutual agreement, then PROPLENX REALTY shall be entitled to claim from both Purchaser and Vendor respectively an administrative charges based on 10% of the Professional Fee subject to a minimum amount of RM1000.</li>
					        </ul>
					    </li>
					    <br /><br />
					    <li>
					        <p style="line-height: 2;">
					            This Offer to Purchase *is / is not subject to loan approval.
					        </p>
					    </li>
					    <br />
					    <li>
					        <p>
					            WHERE THE PURCHASE IS SUBJECT TO LOAN APPROVAL, then, notwithstanding anything provided otherwise in this Offer to Purchase, the Purchaser’s Offer herein is conditional upon the Purchaser successfully obtaining at least <span class="underline">{{ $input['nine'] }}</span>% of the Purchase Price to finance its purchase of the Property (“Financing Condition”). The Vendor via its authorised agent or representative, shall refund the Earnest Deposit of RM<span class="underline">{{ $input['ten'] }}</span> free of interest, to the Purchaser IF within that *15/ <span class="underline">{{ $input['eleven'] }}</span> working days from the date the Vendor accepts this Offer –
					        </p>
					        <ul>
					            <li>the Purchaser is not able to fulfill the Financing Condition; AND 
					            </li>
					            <li>(a)	this fact is made known to the Vendor in writing within that *15/ <span class="underline">{{ $input['twelve'] }}</span> working days supported with the necessary documents including rejection letter from at least 2 Financiers.</li>
					        </ul>
					    </li>
					    <br /><br />
					    <li>
					        <p>
					            <strong>LEGAL FEES & EXPENSES</strong>
					            <br />
					            The Purchaser shall bear the stamp duty, registration fees and his legal fees incurred in relation to the purchase/ SPA. The Vendor shall bear his own legal fees, the discharge of charge (or its equivalent) and cost of obtaining the necessary consent from the Developer or the relevant authorities, if any.
					        </p>
					    </li>
					    <br />
					    <li>
					        <p>
					            <strong>VALIDITY & ACCEPTANCE</strong>
					            <br />
					            This Offer to Purchase is valid for <span class="underline">{{ $input['thirteen'] }}</span> working days from the date of the Offer by the Purchaser herein. When this Offer is not accepted by the Vendor within the stipulated validity period, the Earnest Deposit paid shall be refunded to the Purchaser free of interest and without any legal recourse.
					        </p>
					    </li>
					    <br />
					    <li>
					        <p>
					            <strong>OTHER CONDITIONS</strong>
					            <br />
					            <span class="">{{ $input['fourteen'] }}</span>
					        </p>
					    </li>
					    <br />
					</ol>
		    	</div>
		    </div>
		    <br /><br />
		    <div class="row">
		    	<div class="col-xs-6">
		    		Signed by the registered proprietor/ beneficial owner of the Property
					<br />
					<br />
					<br />
					<br />
					&nbsp;_____________________________<br />
					(Signature & Company Stamp, if any)<br />
					<br />
					<br />
					Name : <br /><br />
					NRIC No : <br /><br />
					Date : 
		    	</div>
		    	<div class="col-xs-6">
		    		Accepted/ Witnessed by,
					<br />
					<br />
					<br />
					<br />
					<br />
					&nbsp;_____________________________<br />
					(Signature & Company Stamp, if any)<br />
					<br />
					<br />
					Name : <br /><br />
					NRIC No : <br /><br />
					Designation : <br /><br />
					Date : 
		    	</div>
		    </div>
		</div>
   	</body>
</html>