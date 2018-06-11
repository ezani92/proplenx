<!DOCTYPE html>
<html lang="en">
   	<head>
    	<title>PropLenx Realty | Payment Voucher</title>
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
		    	<h4 class="text-center bold">PAYMENT VOUCHER</h4>
		    </div>
		    <br />
		    <div class="row">
		    	<div class="col-xs-7">
		    		Pay To : {{ $submission->user->name }}
		    		<br />
		    		<br />
		    		NRIC/ Passport/ Company No: {{ $submission->user->nric }}
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
							<td>{{ $submission->property_address }}</td>
							<td></td>
						</tr>
						<tr>
							<td>1.</td>
							<td>Commission</td>
							<td>
								@php
									$commision = $submission->amount_payable_to_negotiator * 0.4;
								@endphp
								{{ $commision }}
							</td>
						</tr>
						<tr>
							<td>2.</td>
							<td>Incentive </td>
							<td>
								@php
									$incentive = $submission->amount_payable_to_negotiator * 0.6;
								@endphp
								{{ $incentive }}
							</td>
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
							<td>{{ $submission->amount_payable_to_negotiator }}</td>
						</tr>
					</table>
				</div>
		    </div>
		    <br />
		    <div class="row">
		    	<div class="col-xs-12">
		    		
					<br />
					<i>This is a computer generated document, No signature is required</i>
		    	</div>
		    </div>
		</div>
   	</body>
</html>