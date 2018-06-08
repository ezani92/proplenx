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
                            <h3>Offer To Purchase</h3>
                            <div class="panel panel-default panel-border-color panel-border-color-primary">
                                <div class="panel-body">
									<form class="form" method="post" action="{{ url('negotiator/eform/offer-to-purchase') }}">
										@csrf
										<h4>Fill the form to generate the "offer to purchase" form.</h4>
										<br />
										<div class="form-group">
											<label>Property Address :</label>
											<textarea class="form-control" name="address"></textarea>
										</div>
										<div class="form-group">
											<label>Build up : Approximately <input class="input-para" type="text" name="one">  square feet/ others : <input class="input-para" type="text" name="two"></label>
										</div>
										<p style="line-height: 2;">
											The Purchaser(s) and/or Nominee(s) (“Purchaser”) hereby offer to purchase and the Vendor (s) and/or Nominee(s) (“Vendor”) hereby accepts the offer to purchase the above property on an “As Is Where Is Basis” with attached inventory (if any) subject to the following terms and conditions:
										</p>
										<br />
										<ol class="no-indent">
											<li>
												<p style="line-height: 2;">
													PURCHASE PRICE : RM<input class="input-para" type="text" name="three"> *plus <input class="input-para" type="text" name="four"> % Goods & Services Tax (GST)
												</p>
											</li><br />
											<li>
												<p style="line-height: 2;">
													The Purchaser shall upon the signing of this Offer to Purchase, pay an Earnest Deposit of RM<input class="input-para" type="text" name="five"> (Cheque No. <input class="input-para" type="text" name="six">/ Bank Transfer) to PROPLENX REALTY (CIMB Bank Bhd Client’s Account No. 8009198205), or <input class="input-para" type="text" name="seven"> as stakeholder upon the terms and conditions herein. 
												</p>
											</li><br />
											<li>
												<p style="line-height: 2;">
													<strong>APPOINTMENT</strong>
													<br />
													The Vendor hereby agrees to appoint and authorize PROPLENX REALTY to -
												</p>
												<ul>
													<li>act on its behalf to sell the Property and shall pay to PROPLENX REALTY the Professional Fees plus GST in accordance with the Seventh Schedule of the Valuers, Appraisers and Estate Agents Act 1981 (“Schedule”), as agreed, due and payable immediately upon signing of the SPA, regardless of any subsequent abortion or termination of the SPA for whatsoever reason; 
													</li>
													<li>to hold the Earnest Deposit on its behalf as stakeholder and to deduct the Professional Fees from the Earnest Deposit collected when it is due and payable in accordance with the clause 3(a).
												</ul>
											</li><br />
											<li>
												<p style="line-height: 2;">
													<strong>PAYMENT TERMS</strong>
													<br />
												</p>
												<ul>
													<li>10% of the Purchase Price less the Earnest Deposit shall be paid by the Purchaser upon the signing of the SPA; 
													</li>
													<li>The Purchaser shall settle the remaining 90% of the Purchase Price within 3 months from the date of SPA/Consent of the Developer / relevant authorities whichever is later, with an extension period of 30 days subject to an interest of 8% per annum on the Balance Sum calculated on the daily rest basis.
												</ul>
											</li><br />
											<li>
												<p style="line-height: 2;">
													<strong>DEFAULT</strong>
													<br />
													The SPA must be signed by both parties within *15/ <input class="input-para" type="text" name="eight"> working days from the date of acceptance by the Vendors and/or receipt of Earnest Deposit (whichever is later). In default of signing the SPA within the stipulated period -
												</p>
												<ul>
													<li>by the Purchaser, PROVIDED that there is no undue delay on the part of the Vendor or Vendor's Solicitors, then the Vendor shall be entitled to forfeit the Earnest Deposit paid as agreed liquidated damages, which shall be shared equally between the Vendor and PROPLENX REALTY;
													</li>
													<li>by the Vendor, PROVIDED that there is no undue delay on the part of the Purchaser or Purchaser's Solicitors, then the Vendor shall refund the Earnest Deposit to the Purchaser together with a compensation sum of equivalent amount which shall be shared equally between the Purchaser and PROPLENX REALTY, failing which the Purchaser shall be entitled to seek for specific performance at the cost and expense of the Vendor;</li>
													<li>by both the Vendor and Purchaser on mutual agreement, then PROPLENX REALTY shall be entitled to claim from both Purchaser and Vendor respectively an administrative charges based on 10% of the Professional Fee subject to a minimum amount of RM1000.</li>
												</ul>
											</li><br />
											<li>
												<p style="line-height: 2;">
													This Offer to Purchase *is / is not subject to loan approval.
												</p>
											</li><br />
											<li>
												<p style="line-height: 2;">
													WHERE THE PURCHASE IS SUBJECT TO LOAN APPROVAL, then, notwithstanding anything provided otherwise in this Offer to Purchase, the Purchaser’s Offer herein is conditional upon the Purchaser successfully obtaining at least <input class="input-para" type="text" name="nine">% of the Purchase Price to finance its purchase of the Property (“Financing Condition”). The Vendor via its authorised agent or representative, shall refund the Earnest Deposit of RM<input class="input-para" type="text" name="ten"> free of interest, to the Purchaser IF within that *15/ <input class="input-para" type="text" name="eleven"> working days from the date the Vendor accepts this Offer –
												</p>
												<ul>
													<li>the Purchaser is not able to fulfill the Financing Condition; AND 
													</li>
													<li>(a)	this fact is made known to the Vendor in writing within that *15/ <input class="input-para" type="text" name="twelve"> working days supported with the necessary documents including rejection letter from at least 2 Financiers.</li>
												</ul>
											</li><br />
											<li>
												<p style="line-height: 2;">
													<strong>LEGAL FEES & EXPENSES</strong>
													<br />
													The Purchaser shall bear the stamp duty, registration fees and his legal fees incurred in relation to the purchase/ SPA. The Vendor shall bear his own legal fees, the discharge of charge (or its equivalent) and cost of obtaining the necessary consent from the Developer or the relevant authorities, if any.
												</p>
											</li><br />
											<li>
												<p style="line-height: 2;">
													<strong>1.	VALIDITY & ACCEPTANCE</strong>
													<br />
													This Offer to Purchase is valid for <input class="input-para" type="text" name="thirteen"> working days from the date of the Offer by the Purchaser herein. When this Offer is not accepted by the Vendor within the stipulated validity period, the Earnest Deposit paid shall be refunded to the Purchaser free of interest and without any legal recourse.
												</p>
											</li><br />
											<li>
												<p style="line-height: 2;">
													<strong>OTHER CONDITIONS</strong>
													<br />
													<textarea class="form-control" name="fourteen"></textarea>
												</p>
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