<!DOCTYPE html>
<html lang="en">
   	<head>
    	<title>PropLenx Realty | Offer To Rent</title>
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
		    	<h5 class="text-center underline">OFFER TO RENT</h5>
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
					        <p style="line-height: 16px;">
					            Monthly Rental : RM <span class="underline">{{ $input['three'] }}</span> *plus <span class="underline">{{ $input['four'] }}</span>% Goods & Services Tax (GST), Totaling RM <span class="underline">{{ $input['five'] }}</span>
					        </p>
					    </li>
					    <br />
					    <li>
					        <p style="line-height: 16px;">
					            Upon signing of this Offer to Rent, the Tenant shall pay an Earnest Deposit sum (inclusive of GST, if any) amounting to RM <span class="underline">{{ $input['six'] }}</span> (Cheque No.: <span class="underline">{{ $input['seven'] }}</span>/ Bank Transfer) to PROPLENX REALTY (CIMB Bank Bhd Client’s Account No. 8009198205) / <span class="underline">{{ $input['eight'] }}</span> who shall hold the same as stakeholder upon the terms and conditions herein pending the execution of the Tenancy Agreement by both parties.
					        </p>
					    </li>
					    <br />
					    <li>
					        <p style="line-height: 16px;">
					            Total Payments/ Deposits payable by the Tenant as below.
					        </p>
					        <table class="table" style="line-height: 16px;">
					            <tr>
					                <td width="5%">(a)</td>
					                <td>Earnest Deposit (Advanced Rental)  for One Month (inclusive of GST, if any</td>
					                <td>RM <span class="underline">{{ $input['cal-1'] }}</span></td>
					            </tr>
					            <tr>
					                <td>(b)</td>
					                <td>Securities Deposit for <span class="underline">{{ $input['nine'] }}</span> Month(s)</td>
					                <td>RM <span class="underline">{{ $input['cal-2'] }}</span></td>
					            </tr>
					            <tr>
					                <td>(c)</td>
					                <td>Utilities Deposit for <span class="underline">{{ $input['ten'] }}</span> Month(s)	</td>
					                <td>RM <span class="underline">{{ $input['cal-3'] }}</span></td>
					            </tr>
					            <tr>
					                <td>(d)</td>
					                <td>Stamping and Disbursement Fees for Tenancy Agreement</td>
					                <td>RM <span class="underline">{{ $input['cal-4'] }}</span></td>
					            </tr>
					            <tr>
					                <td></td>
					                <td>TOTAL PAYMENT</td>
					                <td>RM <span class="underline">{{ $input['cal-5'] }}</span></td>
					            </tr>
					            <tr>
					                <td></td>
					                <td>Less: Earnest Deposit Paid </td>
					                <td>RM <span class="underline">{{ $input['cal-6'] }}</span></td>
					            </tr>
					            <tr>
					                <td></td>
					                <td>Balance Payment </td>
					                <td>RM <span class="underline">{{ $input['cal-7'] }}</span></td>
					            </tr>
					        </table>
					    </li>
					    <br />
					    <li>
					        <p style="line-height: 16px;">
					            The Balance Payment must be fully settled before release of keys which shall in any event not later than the period stipulated in clause 7 below, failing which clause 7(a) below shall apply
					        </p>
					    </li>
					    <br />
					    <li>
					        <p style="line-height: 16px;">
					            Tenancy Commencement Date	: <span class="underline">{{ $input['eleven'] }}</span> *with a rent-free renovation/ shift-in period from <span class="underline">{{ $input['twelve'] }}</span> to <span class="underline">{{ $input['thirteen'] }}</span> provided that the Tenant shall have fully settled the payments in clause 3 above and executed the Tenancy Agreement before keys may be handed over to the Tenant.
					        </p>
					    </li>
					    <br />
					    <li>
					        <p style="line-height: 16px;">
					            Tenure of Tenancy : <span class="underline">{{ $input['fourteen'] }}</span> Year(s) fixed term, with an option to renew for another <span class="underline">{{ $input['fiveteen'] }}</span> Year(s) at prevailing market rental to be mutually agreed by both parties. 
					        </p>
					    </li>
					    <br />
					    <li>
					        <p style="line-height: 16px;">
					            The Tenancy Agreement must be signed by both parties within *15 OR <span class="underline">{{ $input['sixteen'] }}</span> working days from the date of acceptance by the Landlord. In default of signing the Tenancy Agreement within the stipulated period  -
					        </p>
					        <ul class="no-indent">
					            <li><p style="line-height: 16px;">by the Tenant (provided that there is no undue delay on the part of the Landlord or Landlord’s Solicitor), the Landlord shall be entitled to forfeit the Earnest Deposit sum paid as agreed liquidated damages, which shall be shared equally between the Landlord and PROPLENX REALTY; </p>
					            </li>
					            <li><p style="line-height: 16px;">by the Landlord (provided that there is no undue delay on the part of the Tenant or Tenant’s Solicitor), the Landlord shall refund the Earnest Deposit sum to the Tenant together with a compensation sum of equivalent to 1 month’s rental which shall be shared equally between the Tenant and PROPLENX REALTY failing which the Tenant shall be entitled to seek for specific performance at the cost and expense of the Landlord;</p></li>
					            <li><p style="line-height: 16px;">by both the Tenant and Landlord at mutually agreed terms, then PROPLENX REALTY shall be entitled to claim from both the Tenant and Landlord respectively an administrative charges based on 10% of the Professional Fee subject to a minimum sum of RM500.</p></li>
					        </ul>
					    </li>
					    <br />
					    <li>
					        <p style="line-height: 16px;">
					            All expenses including Stamping Fees and preparation of the Tenancy Agreement shall be borne by the Tenant.
					        </p>
					    </li>
					    <br />
					    <li>
					        <p style="line-height: 16px;">
					            This Offer to Rent is valid for <span class="underline">{{ $input['seventeen'] }}</span> working days from the date of the Tenant’s offer and is subject to the acceptance by the Landlord. If or when it is not accepted, the Earnest Deposit sum paid herewith shall be refunded in full to the Tenant without any interest and without any legal recourse.
					    </li>
					    <br />
					    <li>
					        <p style="line-height: 16px;">
					            <strong>OTHER CONDITIONS</strong>
					            <br />
					            <span class="underline">{{ $input['eighteen'] }}</span>
					        </p>
					    </li>
					    <br />
					    <li>
					        <p style="line-height: 16px;">
					            The Landlord hereby agrees to appoint and authorize PROPLENX REALTY to act on its behalf to rent out the Property and shall pay to PROPLENX REALTY the Professional Fees equivalent to *1.25 / <span class="underline">{{ $input['nineteen'] }}</span> month(s) rental plus GST in accordance with the Seventh Schedule of the Valuers, Appraisers and Estate Agents Act 1981 (“Schedule”), as agreed, due and payable immediately upon signing of the Tenancy Agreement or handover of the Property to the Tenant whichever is earlier, regardless of any subsequent abortion or termination of the Tenancy Agreement for whatsoever reason.
					    </li>
					    <br />
					    <li>
					        <p style="line-height: 16px;">
					            The Landlord hereby authorizes PROPLENX REALTY to hold the Earnest Deposit on its behalf as stakeholder and to deduct the Professional Fees from the Deposit collected when it is due and payable in accordance with the clause 11 above. 
					    </li>
					    <br />
					    <li>
					        <p style="line-height: 16px;">
					            The Landlord hereby agrees to pay PROPLENX REALTY amount equivalent to *50% / <span class="underline">{{ $input['twenty'] }}</span> of the Professional Fees stated in clause 11 above as renewal professional fees in accordance with the Schedule, as agreed, due and payable immediately upon signing of the tenancy renewal letter/ agreement for the tenancy thereafter.
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
					Name : <br />
					NRIC No : <br />
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
					Name : <br />
					NRIC No : <br />
					Designation : <br />
					Date : 
		    	</div>
		    </div>
		</div>
   	</body>
</html>