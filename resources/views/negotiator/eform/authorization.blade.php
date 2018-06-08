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
                            <h3>Authorization To Sell</h3>
                            <div class="panel panel-default panel-border-color panel-border-color-primary">
                                <div class="panel-body">
									<form class="form" method="post" action="{{ url('negotiator/eform/authorization-to-sell') }}">
										@csrf
										<h4>Fill the form to generate the "authorization to sell" form.</h4>
										<br />
										<div class="form-group">
											<label>Property Address :</label>
											<textarea class="form-control" name="address"></textarea>
										</div>
										<p style="line-height: 3;">
											I / We <input class="input-para" type="text" name="one"> (NRIC / Passport / Company No <input class="input-para" type="text" name="two">) as the registered/ beneficial owner(s) or its nominee(s) (“Vendor”) of the above Property, hereby appoint PROPLENX REALTY as my/ our AGENT to sell the said Property to any purchaser(s) or its nominee(s) (“Purchaser”) at the selling price of RM <input class="input-para" type="text" name="three"> only or nearest offer to be agreed by the Vendor (“Purchase Price”) subject to the following terms and conditions:

										</p>
										<br />
										<ol class="no-indent">
											<li>
												<p style="line-height: 2;">
													In consideration of PROPLENX REALTY providing the service for the sale of the said Property, the Vendor hereby agrees to pay PROPLENX REALTY a professional fees equivalent to * <input class="input-para" type="text" name="four"> % of the Purchase Price of the said Property, OR  a professional fee equivalent to RM<input class="input-para" type="text" name="five">, plus <input class="input-para" type="text" name="six">% Goods & Services Tax (GST) on the professional fees upon the sale of the said Property to any Purchaser procured and/or introduced by PROPLENX REALTY and upon the execution of the formal Sale and Purchase Agreement (“SPA”) by both parties.
												</p>
											</li>
											<li>
												<p style="line-height: 2;">
													The Vendor agrees that the services of PROPLENX REALTY are fully discharged upon the signing of the SPA between the Vendor and the Purchaser and PROPLENX REALTY shall be entitled the full professional fee from the Vendor even though the sale is subsequently aborted. PROPLENX REALTY is fully entitled to claim for the professional fee stated in clause 1 above against the Vendor under all circumstances and at all times as long as the Vendor signs or enters into the SPA with the same Purchaser in respect of the same subject Property even though the said SPA was entered subsequent to an abortion of an earlier SPA.
												</p>
											</li>
											<li>
												<p style="line-height: 2;">
													The Vendor hereby authorize PROPLENX REALTY to collect and accept from the Purchaser on behalf of the Vendor, a sum equivalent to <input class="input-para" type="text" name="seven">% of the Purchase Price (“Earnest Deposit”) as Stakeholder. PROPLENX REALTY is authorised to deduct the professional fee and GST due from the Earnest Deposit upon execution of the SPA before releasing the balance (if any) to the Vendor. In the event the said Earnest Deposit is insufficient to settle the full professional fees and GST, the Vendor undertakes and agrees to make good the shortfall immediately.
												</p>
											</li>
											<li>
												<p style="line-height: 2;">
													In the event Earnest Deposit has been paid and the sale transaction is aborted by the Vendor or the Purchaser before the execution of the SPA, the Vendor agrees to pay PROPLENX REALTY a professional fee equivalent to 50% of the Earnest Deposit or forfeitable deposit, or 50% of the agreed full professional fee, whichever is lesser, plus the relevant applicable GST.
												</p>
											</li>
											<li>
												<p style="line-height: 2;">
													The Vendor agrees to fully indemnify PROPLENX REALTY against all losses, damages or claims by the Purchaser if the Vendor for any reason whatsoever fails or refuse to execute, or does not proceed with the execution of, the SPA after the Earnest Deposit has been paid or collected.
												</p>
											</li>
											<li>
												<p style="line-height: 2;">
													The Vendor authorizes PROPLENX REALTY to utilize any form of advertisement to promote the sale of the said Property, including but not limited to putting up a “For Sale” signboard at the said Property or to advertise the said Property through any form of media.
												</p>
											</li>
											<li>
												<p style="line-height: 2;">
													The instruction contained herein is given to PROPLENX REALTY in the Vendor’s capacity as – (DELETE whichever not applicable)
												</p>
												<ul>
													<li>The registered proprietor/ absolute beneficial owner of the said Property; or</li>
													<li>Trustee for the legal owner of the said Property/ Personal Representative (Executor or Administrator) of the owner (deceased); or</li>
													<li>Attorney of the registered proprietor/ duly authorised representative of the owner pursuant to a Power of Attorney dated <input class="input-para" type="text" name="eight"></li>
												</ul>
											</li>
											<br />
											<li>
												<p style="line-height: 2;">
													The Vendor agrees to indemnify and keep PROPLENX REALTY indemnified against all Solicitors legal fees, disbursements, expenses and cost incurred by PROPLENX REALTY in respect of any and all legal related advice, notice, demands, and proceedings involved or suits instituted by PROPLENX REALTY against the Vendor or Purchaser in relation to the sale and purchase of the said Property, or that in relation to the issue of Stakeholder instituted by the Vendor or Purchaser against PROPLENX REALTY.
												</p>
											</li>
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