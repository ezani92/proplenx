<!DOCTYPE html>
<html lang="en">
    <head>
        @include('negotiator.header')
            <div class="be-content">
                <div class="main-content container-fluid">
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <h3>Offer To Rent</h3>
                            <div class="panel panel-default panel-border-color panel-border-color-primary">
                                <div class="panel-body">
									<form class="form" method="post" action="{{ url('negotiator/eform/offer-to-rent') }}">
										@csrf
										<h4>Fill the form to generate the "offer to rent" form.</h4>
										<br />
										<div class="form-group">
											<label>Property Address :</label>
											<textarea class="form-control" name="address"></textarea>
										</div>
										<div class="form-group">
											<label>Build up : Approximately <input class="input-para" type="text" name="one">  square feet/ others : <input class="input-para" type="text" name="two"></label>
										</div>
										<p style="line-height: 2;">
											The Tenant(s) and/or Nominee(s) (“Tenant”) hereby offer to rent and the Landlord(s) and/or Nominee(s) (“Landlord”) hereby accepts the offer to rent the above property on an “As Is Where Is Basis” with attached inventory (if any), subject to the following terms and conditions:
										</p>
										<br />
										<ol class="no-indent">
											<li>
												<p style="line-height: 2;">
													Monthly Rental : RM <input class="input-para" type="text" name="three"> *plus <input class="input-para" type="text" name="four">% Goods & Services Tax (GST), Totaling RM <input class="input-para" type="text" name="five">
												</p>
											</li><br />
											<li>
												<p style="line-height: 2;">
													Upon signing of this Offer to Rent, the Tenant shall pay an Earnest Deposit sum (inclusive of GST, if any) amounting to <input class="input-para" type="text" name="six"> (Cheque No.: <input class="input-para" type="text" name="seven">/ Bank Transfer) to PROPLENX REALTY (CIMB Bank Bhd Client’s Account No. 8009198205) / <input class="input-para" type="text" name="eight"> who shall hold the same as stakeholder upon the terms and conditions herein pending the execution of the Tenancy Agreement by both parties.
												</p>
											</li><br />
											<li>
												<p style="line-height: 2;">
													Total Payments/ Deposits payable by the Tenant as below.
												</p>
												<table class="table">
													<tr>
														<td width="5%">(a)</td>
														<td>Earnest Deposit (Advanced Rental)  for One Month (inclusive of GST, if any</td>
														<td>RM <input class="input-para" type="text" name="cal-1" readonly="true"></td>
													</tr>
													<tr>
														<td>(b)</td>
														<td>Securities Deposit for <input class="input-para" type="text" name="nine"> Month(s)</td>
														<td>RM <input class="input-para" type="text" name="cal-2" readonly="true"></td>
													</tr>
													<tr>
														<td>(c)</td>
														<td>Utilities Deposit for <input class="input-para" type="text" name="ten"> Month(s)	</td>
														<td>RM <input class="input-para" type="text" name="cal-3" readonly="true"></td>
													</tr>
													<tr>
														<td>(d)</td>
														<td>Stamping and Disbursement Fees for Tenancy Agreement</td>
														<td>RM <input class="input-para" type="text" name="cal-4" readonly="true"></td>
													</tr>
													<tr>
														<td></td>
														<td>TOTAL PAYMENT</td>
														<td>RM <input class="input-para" type="text" name="cal-5" readonly="true"></td>
													</tr>
													<tr>
														<td></td>
														<td>Less: Earnest Deposit Paid </td>
														<td>RM <input class="input-para" type="text" name="cal-6" readonly="true"></td>
													</tr>
													<tr>
														<td></td>
														<td>Balance Payment </td>
														<td>RM <input class="input-para" type="text" name="cal-7" readonly="true"></td>
													</tr>
												</table>
											</li><br />
											<li>
												<p style="line-height: 2;">
													The Balance Payment must be fully settled before release of keys which shall in any event not later than the period stipulated in clause 7 below, failing which clause 7(a) below shall apply
												</p>
											</li><br />
											<li>
												<p style="line-height: 2;">
													Tenancy Commencement Date	: <input class="input-para" type="text" name="eleven"> *with a rent-free renovation/ shift-in period from <input class="input-para" type="text" name="twelve"> to <input class="input-para" type="text" name="thirteen"> provided that the Tenant shall have fully settled the payments in clause 3 above and executed the Tenancy Agreement before keys may be handed over to the Tenant.
												</p>
											</li><br />
											<li>
												<p style="line-height: 2;">
													Tenure of Tenancy : <input class="input-para" type="text" name="fourteen"> Year(s) fixed term, with an option to renew for another <input class="input-para" type="text" name="fiveteen"> Year(s) at prevailing market rental to be mutually agreed by both parties. 
												</p>
											</li><br />
											<li>
												<p style="line-height: 2;">
													The Tenancy Agreement must be signed by both parties within *15 OR <input class="input-para" type="text" name="sixteen"> working days from the date of acceptance by the Landlord. In default of signing the Tenancy Agreement within the stipulated period  -
												</p>
												<ul>
													<li>by the Tenant (provided that there is no undue delay on the part of the Landlord or Landlord’s Solicitor), the Landlord shall be entitled to forfeit the Earnest Deposit sum paid as agreed liquidated damages, which shall be shared equally between the Landlord and PROPLENX REALTY; 
													</li>
													<li>by the Landlord (provided that there is no undue delay on the part of the Tenant or Tenant’s Solicitor), the Landlord shall refund the Earnest Deposit sum to the Tenant together with a compensation sum of equivalent to 1 month’s rental which shall be shared equally between the Tenant and PROPLENX REALTY failing which the Tenant shall be entitled to seek for specific performance at the cost and expense of the Landlord;</li>
													<li>by both the Tenant and Landlord at mutually agreed terms, then PROPLENX REALTY shall be entitled to claim from both the Tenant and Landlord respectively an administrative charges based on 10% of the Professional Fee subject to a minimum sum of RM500.</li>
												</ul>
											</li><br />
											<li>
												<p style="line-height: 2;">
													All expenses including Stamping Fees and preparation of the Tenancy Agreement shall be borne by the Tenant.
												</p>
											</li><br />
											<li>
												<p style="line-height: 2;">
													This Offer to Rent is valid for <input class="input-para" type="text" name="seventeen"> working days from the date of the Tenant’s offer and is subject to the acceptance by the Landlord. If or when it is not accepted, the Earnest Deposit sum paid herewith shall be refunded in full to the Tenant without any interest and without any legal recourse.
											</li><br />
											<li>
												<p style="line-height: 2;">
													<strong>OTHER CONDITIONS</strong>
													<br />
													<textarea class="form-control" name="eighteen"></textarea>
												</p>
											</li><br />
											<li>
												<p style="line-height: 2;">
													The Landlord hereby agrees to appoint and authorize PROPLENX REALTY to act on its behalf to rent out the Property and shall pay to PROPLENX REALTY the Professional Fees equivalent to *1.25 / <input class="input-para" type="text" name="nineteen"> month(s) rental plus GST in accordance with the Seventh Schedule of the Valuers, Appraisers and Estate Agents Act 1981 (“Schedule”), as agreed, due and payable immediately upon signing of the Tenancy Agreement or handover of the Property to the Tenant whichever is earlier, regardless of any subsequent abortion or termination of the Tenancy Agreement for whatsoever reason.
											</li><br />
											<li>
												<p style="line-height: 2;">
													The Landlord hereby authorizes PROPLENX REALTY to hold the Earnest Deposit on its behalf as stakeholder and to deduct the Professional Fees from the Deposit collected when it is due and payable in accordance with the clause 11 above. 
											</li><br />
											<li>
												<p style="line-height: 2;">
													The Landlord hereby agrees to pay PROPLENX REALTY amount equivalent to *50% / <input class="input-para" type="text" name="twenty"> of the Professional Fees stated in clause 11 above as renewal professional fees in accordance with the Schedule, as agreed, due and payable immediately upon signing of the tenancy renewal letter/ agreement for the tenancy thereafter.
											</li><br />
											
										</ol>
										<br /><br />
										<button type="submit" class="btn btn-info btn-block">Ganerate PDF File</button>
									</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @include('negotiator.footer')
</html>