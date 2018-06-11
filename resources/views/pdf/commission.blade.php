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

			.bold
			{
				font-weight: bold;
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
		    	<h4 class="text-center bold">INVOICE</h4>
		    </div>
		    <br />
		    <div class="row">
		    	<div class="col-xs-7">
		    		To: {{ $submission->landlord_vendor_name }}<br />
		    		{{ $submission->landlord_vendor_ic_no }}<br />
		    		{{ $submission->landlord_vendor_address }}<br />
		    	</div>
		    	<div class="col-xs-5">
		    		Date: {{ now()->format('d M Y') }}
		    		<br />
		    		<br />
		    		Ref No : {{ $submission->form_code }}
		    	</div>
		    </div>
		    <br />
		    <div class="row">
				<div class="col-xs-12">
					<table class="table table-bordered table-condensed">
						<tr class="text-center">
							<td width="5%"><strong>Item</strong></td>
							<td><strong>Description</strong></td>
							<td width="20%"><strong>Amount (RM)</strong></td>
						</tr>
						<tr>
							<td></td>
							<td>For the {{ $submission->submission_type }} of {{ $submission->property_address }}</td>
							<td></td>
						</tr>
						<tr>
							<td>1.</td>
							<td>Professional Fees</td>
							<td>{{ $submission->amount_to_invoice_landlord }}</td>
						</tr>
						<tr>
							<td>2.</td>
							<td>Goods & Services Tax (if any)</td>
							<td>{{ $submission->gst_by_landlord_vendor }}</td>
						</tr>
						<tr>
							<td></td>
							<td>&nbsp;</td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>&nbsp;</td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td class="text-center">Total</td>
							<td>{{ $submission->pro_fee_gst }}</td>
						</tr>
					</table>
				</div>
		    </div>
		    <br />
		    <div class="row">
		    	<div class="col-xs-12">
		    		Payments shall be made to PROPLENX REALTY’s account below.
		    		<br />
		    		<br />
		    		Account Name	: <strong>PROPLENX REALTY </strong><br />
					Account No.	: <br />
					Bank	:<br />
					Bank Address	:<br />
					Swift Code	:<br />
					<br /><br /><br />
					<p>
						Payment MUST be made within 14 days from the date of this invoice failing which PropLenx Realty shall be entitled to claim any outstanding Professional Fee together with late payment interest at the rate of 1.5% per month on the outstanding Professional Fee and GST from the due date until its full settlement.
					</p>
					<br /><br /><br />
					<i>This is a computer generated document, No signature is required</i>
		    	</div>
		    </div>
		</div>
   	</body>
</html>