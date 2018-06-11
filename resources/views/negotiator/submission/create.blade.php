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
                        <form method="post" action="{{ url('negotiator/submission') }}" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Create Submission</h3>
                                    <div class="panel panel-border-color panel-border-color-primary">
                                        <div class="panel-heading">SUBMISSION DETAILS</div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Submission Type</strong></label>
                                                        <select class="form-control" name="submission_type" required>
                                                            <option value="">Select</option>
                                                            <option value="Sale">Sale</option>
                                                            <option value="Rent">Rent</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Co-Agency</strong></label>
                                                        <select class="form-control" name="co_agency" id="co_agency" required>
                                                            <option value="1">No</option>
                                                            <option value="2">Internal CoAgency</option>
                                                            <option value="3">Proplenx Collect Deposit. Third Party To Invoice Proplenx</option>
                                                            <option value="4">CoAgent Collect Deposit, PropLenx to Invoice CoAgent</option>
                                                            <option value="5">Internal Referral</option>
                                                            <option value="6">External Referral</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Status</strong></label>
                                                        <select class="form-control" name="status" required>
                                                            <option value="">Select</option>
                                                            <option value="2">Pending CoNegotiator Invoice</option>
                                                            <option value="3">Pending CoAgency Payment</option>
                                                            <option value="4">Pending Referral Invoice</option>
                                                            <option value="5">Pending Bank-in Slip</option>
                                                            <option value="6">Pending Payment from Landlord</option>\
                                                            <option value="8">Admin Refer Remark</option>\
                                                            <option value="10">Ready for Commission Payment </option>\
                                                            <option value="12">Admin to Issue Invoice &/or Receipt </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-border-color panel-border-color-primary">
                                        <div class="panel-heading">TRANSACTION DETAILS & FEES</div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Form Code *</strong></label>
                                                        <input type="text" name="form_code" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Rental Expiry Date</strong></label>
                                                        <input type="text" value="" class="form-control datepicker" name="rental_expiry_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label><strong>Full Property Address</strong></label>
                                                    <textarea class="form-control" name="property_address" required></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Selling / Rental Price</strong></label>
                                                        <input type="text" name="selling_rental_price" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Amount Banked In To Proplenx</strong></label>
                                                        <input type="text" step="0.01" id="amount_bank_in_to_proplex" name="amount_bank_in_to_proplex" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Professional Fee (RM)</strong></label>
                                                        <input type="text" step="0.01" id="pro_fee" name="pro_fee" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>
                                                            <strong>Professional Fee has included GST</strong>
                                                            <code>[Professional Fee x GST]</code>
                                                        </label>
                                                        <input type="text" id="pro_fee_gst" class="form-control" name="pro_fee_gst" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>GST by Landlord/ Vendor (RM)</strong>
                                                            <code>[0% or 6% of Professional Fee]</code></label>
                                                        <select class="form-control" name="gst_by_landlord_vendor" id="gst_by_landlord_vendor">
                                                            <option value="0">0 %</option>
                                                            <option value="0.06">6 %</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Amount to Invoice Landlord/ Vendor (RM)</strong>
                                                            <code>[Professional Fee + GST]</code></label>
                                                        <input type="text" tep="0.01" id="amount_to_invoice_landlord" name="amount_to_invoice_landlord" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Stamp Duty and Tenancy Preparation Fee or Other Reimbursement Fees (RM)</strong></label>
                                                        <input type="text" step="0.01" id="stamp_duty" name="stamp_duty" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Negotiator's Commission & Marketing Fees (RM)</strong>
                                                            <code>[Commision Percentage x Professional Fee]</code></label>
                                                        <input type="text" step="0.01" id="negotiator_commision" name="negotiator_commision" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Balance Due to Landlord / Vendor</strong>
                                                            <code>[Amount Banked In to PropLenx - Amount to Invoice Landlord / Stamp Duty]</code></label>
                                                        <input type="text" tep="0.01" id="balance_due_landlord_vendor" name="balance_due_landlord_vendor" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Amount Payable to Negotiator (RM)</strong>
                                                            <code>[Nego Commission + Marketing Fees + Stamp Duty or Other Reimbursement Fees - RM10]</code></label>
                                                        <input type="text" step="0.01" id="amount_payable_to_negotiator" name="amount_payable_to_negotiator" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Balance (RM)</strong>
                                                            <code>[BankIn Amount - (Professional Fees + Stamp Duty or Other Reimbursement Fees + GST Tax) - Balance Due to Landlord / Vendor]</code></label>
                                                        <input type="text" tep="0.01" id="balance" name="balance" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-border-color panel-border-color-primary">
                                        <div class="panel-heading">Landlord / Vendor Details</div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Fullname / Company Name</strong></label>
                                                        <input type="text" name="landlord_vendor_name" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>NRIC / Company No</strong></label>
                                                        <input type="text" name="landlord_vendor_ic_no" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Correspondence Address</strong></label>
                                                        <textarea class="form-control" name="landlord_vendor_address" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Bank Name</strong></label>
                                                        <select class="form-control" name="landlord_vendor_bank_name" >
                                                            <option value="AMBank">AMBank</option>
                                                            <option value="Affin Bank Berhad">Affin Bank Berhad</option>
                                                            <option value="Alliance Bank Malaysia Berhad">Alliance Bank Malaysia Berhad</option>
                                                            <option value="Al-Rajhi Bank">Al-Rajhi Bank</option>
                                                            <option value="Bank Islam Malaysia Berhad">Bank Islam Malaysia Berhad</option>
                                                            <option value="Bank Kerjasama Rakyat Malaysia">Bank Kerjasama Rakyat Malaysia</option>
                                                            <option value="Bank Muamalat Malaysia Berhad">Bank Muamalat Malaysia Berhad</option>
                                                            <option value="Bank Pertanian Malaysia Bhd">Bank Pertanian Malaysia Bhd</option>
                                                            <option value="Bank Simpanan Nasional">Bank Simpanan Nasional</option>
                                                            <option value="CIMB">CIMB</option>
                                                            <option value="Citibank Berhad">Citibank Berhad</option>
                                                            <option value="Hong Leong Bank Berhad">Hong Leong Bank Berhad</option>
                                                            <option value="HSBC Bank">HSBC Bank</option>
                                                            <option value="Kuwait Finance House">Kuwait Finance House</option>
                                                            <option value="Maybank">Maybank</option>
                                                            <option value="OCBC Bank (M) Berhad">OCBC Bank (M) Berhad</option>
                                                            <option value="Public Bank">Public Bank</option>
                                                            <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                                                            <option value="United Overseas Bank Berhad">United Overseas Bank Berhad</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Bank Account No.</strong></label>
                                                        <input type="text" name="landlord_vendor_acc_no" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-border-color panel-border-color-primary">
                                        <div class="panel-heading">Tenant / Purchaser Details</div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Fullname / Company Name</strong></label>
                                                        <input type="text" name="tennant_purchaser_name" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>NRIC / Company No</strong></label>
                                                        <input type="text" name="tennant_purchaser_ic_no" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Address</strong></label>
                                                        <textarea class="form-control" name="tennant_purchaser_address" ></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Bank Name</strong></label>
                                                        <select class="form-control" name="tennant_purchaser_bank_name" >
                                                           <option value="AMBank">AMBank</option>
                                                            <option value="Affin Bank Berhad">Affin Bank Berhad</option>
                                                            <option value="Alliance Bank Malaysia Berhad">Alliance Bank Malaysia Berhad</option>
                                                            <option value="Al-Rajhi Bank">Al-Rajhi Bank</option>
                                                            <option value="Bank Islam Malaysia Berhad">Bank Islam Malaysia Berhad</option>
                                                            <option value="Bank Kerjasama Rakyat Malaysia">Bank Kerjasama Rakyat Malaysia</option>
                                                            <option value="Bank Muamalat Malaysia Berhad">Bank Muamalat Malaysia Berhad</option>
                                                            <option value="Bank Pertanian Malaysia Bhd">Bank Pertanian Malaysia Bhd</option>
                                                            <option value="Bank Simpanan Nasional">Bank Simpanan Nasional</option>
                                                            <option value="CIMB">CIMB</option>
                                                            <option value="Citibank Berhad">Citibank Berhad</option>
                                                            <option value="Hong Leong Bank Berhad">Hong Leong Bank Berhad</option>
                                                            <option value="HSBC Bank">HSBC Bank</option>
                                                            <option value="Kuwait Finance House">Kuwait Finance House</option>
                                                            <option value="Maybank">Maybank</option>
                                                            <option value="OCBC Bank (M) Berhad">OCBC Bank (M) Berhad</option>
                                                            <option value="Public Bank">Public Bank</option>
                                                            <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                                                            <option value="United Overseas Bank Berhad">United Overseas Bank Berhad</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Bank Account No.</strong></label>
                                                        <input type="text" name="tennant_purchaser_acc_no" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="display: none;" id="internal-cobroke" class="panel panel-border-color panel-border-color-primary">
                                        <div class="panel-heading">Internal Cobroke</div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Negotiator Name</strong></label>
                                                        <select class="form-control" name="coagent_id" id="coagent_id">
                                                            <option value="">Select</option>
                                                            @foreach($users as $user)
                                                            <option value="{{ $user->id }}" data-rate="{{ $user->commision_rate }}">{{ $user->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>CoAgent Portion Type</strong></label>
                                                        <select class="form-control" name="coagent_portion_type" id="coagent_portion_type">
                                                            <option value="1">Fixed Amount (RM)</option>
                                                            <option value="2">Percentage</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>CoAgent Portion Value</strong></label>
                                                        <input type="text" step="0.01" name="coagent_portion_value" id="coagent_portion_value" placeholder="Type in RM or %" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>CoAgent Portion Amount</strong></label>
                                                        <input type="text" name="coagent_portion_amount" id="coagent_portion_amount" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>GST by Landlord/ Vendor</strong>
                                                            <code>[6% x CoAgent Portion]</code></label>
                                                        <input type="text" name="coagent_gst_by_landlord" id="coagent_gst_by_landlord" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="display: none;" id="external-cobroke-1" class="panel panel-border-color panel-border-color-primary">
                                        <div class="panel-heading"><strong>External Cobroke - Proplenx collected deposit, 3rd party to invoice Proplenx</div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>CoAgent Company Name</strong></label>
                                                        <input type="text" name="coagent_company_name" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>CoAgent Company Portion Type</strong></label>
                                                        <select class="form-control" name="coagent_company_portion_type" id="coagent_company_portion_type">
                                                            <option value="1">Fixed Amount (RM)</option>
                                                            <option value="2">Percentage</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>CoAgent Company Portion Value</strong></label>
                                                        <input type="text" step="0.01" name="coagent_company_portion_value" id="coagent_company_portion_value" placeholder="Type in RM or %" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>CoAgent Portion Amount</strong></label>
                                                        <input type="text" name="coagent_portion_amount_2" id="coagent_portion_amount_2" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>CoAgent Company Bank Name</strong></label>
                                                        <select class="form-control" name="coagent_company_bank_name" id="coagent_company_bank_name" required>
                                                            <option value="AMBank">AMBank</option>
                                                            <option value="Affin Bank Berhad">Affin Bank Berhad</option>
                                                            <option value="Alliance Bank Malaysia Berhad">Alliance Bank Malaysia Berhad</option>
                                                            <option value="Al-Rajhi Bank">Al-Rajhi Bank</option>
                                                            <option value="Bank Islam Malaysia Berhad">Bank Islam Malaysia Berhad</option>
                                                            <option value="Bank Kerjasama Rakyat Malaysia">Bank Kerjasama Rakyat Malaysia</option>
                                                            <option value="Bank Muamalat Malaysia Berhad">Bank Muamalat Malaysia Berhad</option>
                                                            <option value="Bank Pertanian Malaysia Bhd">Bank Pertanian Malaysia Bhd</option>
                                                            <option value="Bank Simpanan Nasional">Bank Simpanan Nasional</option>
                                                            <option value="CIMB">CIMB</option>
                                                            <option value="Citibank Berhad">Citibank Berhad</option>
                                                            <option value="Hong Leong Bank Berhad">Hong Leong Bank Berhad</option>
                                                            <option value="HSBC Bank">HSBC Bank</option>
                                                            <option value="Kuwait Finance House">Kuwait Finance House</option>
                                                            <option value="Maybank">Maybank</option>
                                                            <option value="OCBC Bank (M) Berhad">OCBC Bank (M) Berhad</option>
                                                            <option value="Public Bank">Public Bank</option>
                                                            <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                                                            <option value="United Overseas Bank Berhad">United Overseas Bank Berhad</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>CoAgent Company Bank Account No</strong></label>
                                                        <input type="text" name="coagent_company_bank_acc_no" id="coagent_company_bank_acc_no" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>GST by Landlord/ Vendor</strong>
                                                            <code>[0% or 6% of Professional Fee]</code></label>
                                                        <select class="form-control" name="coagent_gst_by_landlord_vendor" id="coagent_gst_by_landlord_vendor">
                                                            <option value="0">0 %</option>
                                                            <option value="0.06">6 %</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Total Payable to CoAgent</strong>
                                                            <code>[CoAgent Portion + GST by Landlord/ Vendor]</code></label>
                                                        <input type="text" name="total_payable_to_coagent" id="total_payable_to_coagent" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="display: none;" id="external-cobroke-2" class="panel panel-border-color panel-border-color-primary">
                                        <div class="panel-heading">External Cobroke - 3rd party collected deposit, PropL to invoice 3rd party</div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>CoAgent Company Name</strong></label>
                                                        <input type="text" name="coagent_company_name_2" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>CoAgent Company Email</strong></label>
                                                        <input type="text" name="coagent_company_email_2" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>PropLenx Portion</strong></label>
                                                        <select class="form-control" name="proplenx_portion_type_2" id="proplenx_portion_type_2">
                                                            <option value="1">Fixed Amount (RM)</option>
                                                            <option value="2">Percentage</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>PropLenx Portion Value</strong></label>
                                                        <input type="text" step="0.01" name="proplenx_portion_value_2" id="proplenx_portion_value_2" placeholder="Type in RM or %" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>GST by Landlord/ Vendor</strong>
                                                            <code>[6% x CoAgent Portion]</code></label>
                                                        <input type="text" name="coagent_company_gst_by_landlord_2" id="coagent_company_gst_by_landlord_2" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Total Amount to Invoice</strong>
                                                            <code>[PropLenx Portion + GST by Landlord/ Vendor]</code></label>
                                                        <input type="text" name="coagent_company_total_amount_to_invoice_2" id="coagent_company_total_amount_to_invoice_2" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="display: none;" id="internal-referel" class="panel panel-border-color panel-border-color-primary">
                                        <div class="panel-heading">INTERNAL REFERRAL</div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Referral Name</strong></label>
                                                        <input type="text" name="internal_referrel_name" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Referral Bank Name</strong></label>
                                                        <select class="form-control" name="internal_referrel_bankname" id="internal_referrel_bankname" required>
                                                            <option value="AMBank">AMBank</option>
                                                            <option value="Affin Bank Berhad">Affin Bank Berhad</option>
                                                            <option value="Alliance Bank Malaysia Berhad">Alliance Bank Malaysia Berhad</option>
                                                            <option value="Al-Rajhi Bank">Al-Rajhi Bank</option>
                                                            <option value="Bank Islam Malaysia Berhad">Bank Islam Malaysia Berhad</option>
                                                            <option value="Bank Kerjasama Rakyat Malaysia">Bank Kerjasama Rakyat Malaysia</option>
                                                            <option value="Bank Muamalat Malaysia Berhad">Bank Muamalat Malaysia Berhad</option>
                                                            <option value="Bank Pertanian Malaysia Bhd">Bank Pertanian Malaysia Bhd</option>
                                                            <option value="Bank Simpanan Nasional">Bank Simpanan Nasional</option>
                                                            <option value="CIMB">CIMB</option>
                                                            <option value="Citibank Berhad">Citibank Berhad</option>
                                                            <option value="Hong Leong Bank Berhad">Hong Leong Bank Berhad</option>
                                                            <option value="HSBC Bank">HSBC Bank</option>
                                                            <option value="Kuwait Finance House">Kuwait Finance House</option>
                                                            <option value="Maybank">Maybank</option>
                                                            <option value="OCBC Bank (M) Berhad">OCBC Bank (M) Berhad</option>
                                                            <option value="Public Bank">Public Bank</option>
                                                            <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                                                            <option value="United Overseas Bank Berhad">United Overseas Bank Berhad</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Referral Bank Account No</strong></label>
                                                        <input type="text" name="internal_referrel_bankacc" id="internal_referrel_bankacc" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Referral Portion Type</strong></label>
                                                        <select class="form-control" name="internal_referrel_portion_type" id="internal_referrel_portion_type">
                                                            <option value="1">Fixed Amount (RM)</option>
                                                            <option value="2">Percentage</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Referral Portion Value</strong></label>
                                                        <input type="text" step="0.01" name="internal_referrel_portion_value" id="internal_referrel_portion_value" placeholder="Type in RM or %" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>GST by Referral (if any)</strong>
                                                            <code>[6% x Referral Portion]</code></label>
                                                        <input type="text" name="internal_referrel_gst" id="internal_referrel_gst" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Total Payable to Referral</strong>
                                                        <code>[Referral Portion + GST]</code></label>
                                                        <input type="text" name="internal_referrel_total_paid" id="internal_referrel_total_paid" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="display: none;" id="external-referel" class="panel panel-border-color panel-border-color-primary">
                                        <div class="panel-heading">External Referrel</div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Referral Name</strong></label>
                                                        <input type="text" name="external_referrel_name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Referral IC No.</strong></label>
                                                        <input type="text" name="external_referrel_ic" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Referral Correspondence Address</strong></label>
                                                        <textarea name="external_referrel_address" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Referral Bank Name</strong></label>
                                                        <select class="form-control" name="external_referrel_bankname" id="external_referrel_bankname" required>
                                                            <option value="AMBank">AMBank</option>
                                                            <option value="Affin Bank Berhad">Affin Bank Berhad</option>
                                                            <option value="Alliance Bank Malaysia Berhad">Alliance Bank Malaysia Berhad</option>
                                                            <option value="Al-Rajhi Bank">Al-Rajhi Bank</option>
                                                            <option value="Bank Islam Malaysia Berhad">Bank Islam Malaysia Berhad</option>
                                                            <option value="Bank Kerjasama Rakyat Malaysia">Bank Kerjasama Rakyat Malaysia</option>
                                                            <option value="Bank Muamalat Malaysia Berhad">Bank Muamalat Malaysia Berhad</option>
                                                            <option value="Bank Pertanian Malaysia Bhd">Bank Pertanian Malaysia Bhd</option>
                                                            <option value="Bank Simpanan Nasional">Bank Simpanan Nasional</option>
                                                            <option value="CIMB">CIMB</option>
                                                            <option value="Citibank Berhad">Citibank Berhad</option>
                                                            <option value="Hong Leong Bank Berhad">Hong Leong Bank Berhad</option>
                                                            <option value="HSBC Bank">HSBC Bank</option>
                                                            <option value="Kuwait Finance House">Kuwait Finance House</option>
                                                            <option value="Maybank">Maybank</option>
                                                            <option value="OCBC Bank (M) Berhad">OCBC Bank (M) Berhad</option>
                                                            <option value="Public Bank">Public Bank</option>
                                                            <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                                                            <option value="United Overseas Bank Berhad">United Overseas Bank Berhad</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Referral Bank Account No</strong></label>
                                                        <input type="text" name="external_referrel_bankacc" id="external_referrel_bankacc" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Referral Portion Type</strong></label>
                                                        <select class="form-control" name="external_referrel_portion_type" id="external_referrel_portion_type">
                                                            <option value="1">Fixed Amount (RM)</option>
                                                            <option value="2">Percentage</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Referral Portion Value</strong></label>
                                                        <input type="text" step="0.01" name="external_referrel_portion_value" id="external_referrel_portion_value" placeholder="Type in RM or %" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>GST by Referral (if any)</strong>
                                                            <code>[6% x Referral Portion]</code></label>
                                                        <input type="text" name="external_referrel_gst" id="external_referrel_gst" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Total Payable to Referral</strong>
                                                            <code>[Referral Portion + GST]</code></label>
                                                        <input type="text" name="external_referrel_total_paid" id="external_referrel_total_paid" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="supporting-document" class="panel panel-border-color panel-border-color-primary">
                                        <div class="panel-heading">Supporting Document</div>
                                        <div class="panel-body document_lists">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Document</label>
                                                        <input type="file" name="documents[]" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Type</label>
                                                        <select class="form-control" name="documents_type[]" id="document_type">
                                                            <option selected="selected" value="">Select</option>
                                                            <option value="Bank in Slip">Bank in Slip</option>
                                                            <option value="Booking Form">Booking Form</option>
                                                            <option value="Stamped Agreement Relevant Pages">Stamped Agreement Relevant Pages</option>
                                                            <option value="Third Party Invoice">Third Party Invoice</option>
                                                            <option value="Coagency Nego Name Card">Coagency Nego Name Card</option>
                                                            <option value="GST Bank In Slip">GST Bank In Slip</option>
                                                            <option value="Coagency Letter">Coagency Letter</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label></label><br /><br />
                                                    <button type="button" class="btn btn-xl btn-success" onclick="addDoc({{ time() }});">&nbsp;<i class="mdi mdi-plus"></i>&nbsp;</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @csrf
                                    <button type="submit" class="btn btn-block btn-default">Save Form</button>
                                    <button type="submit" class="btn btn-block btn-info">Submit Form</button>


                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        @include('negotiator.footer')
        <script type="text/javascript">

        $( document ).ready(function() {

            $('.multifile').multifile();

            $('.datepicker').datepicker({
                format: 'mm/dd/yyyy',
                maxViewMode: 3
            });

            $("#co_agency").on('change', function(){

                if(this.value == 1)
                {
                    $('#internal-cobroke').hide();
                    $('#external-cobroke-1').hide();
                    $('#external-cobroke-2').hide();
                    $('#internal-referel').hide();
                    $('#external-referel').hide();
                }
                else if(this.value == 2)
                {
                
                    $('#internal-cobroke').show();
                    $('#external-cobroke-1').hide();
                    $('#external-cobroke-2').hide();
                    $('#internal-referel').hide();
                    $('#external-referel').hide();
                }
                else if(this.value == 3)
                {
                
                    $('#internal-cobroke').hide();
                    $('#external-cobroke-1').show();
                    $('#external-cobroke-2').hide();
                    $('#internal-referel').hide();
                    $('#external-referel').hide();
                }
                else if(this.value == 4)
                {
                
                    $('#internal-cobroke').hide();
                    $('#external-cobroke-1').hide();
                    $('#external-cobroke-2').show();
                    $('#internal-referel').hide();
                    $('#external-referel').hide();
                }
                else if(this.value == 5)
                {
                
                    $('#internal-cobroke').hide();
                    $('#external-cobroke-1').hide();
                    $('#external-cobroke-2').hide();
                    $('#internal-referel').show();
                    $('#external-referel').hide();
                }
                else if(this.value == 6)
                {
                
                    $('#internal-cobroke').hide();
                    $('#external-cobroke-1').hide();
                    $('#external-cobroke-2').hide();
                    $('#internal-referel').hide();
                    $('#external-referel').show();
                }
            });

            var options_pro_fee = {
                callback: function (value) { 

                    var gst = parseFloat($('#gst_by_landlord_vendor').val());
                    

                    var pro_fee_gst_raw = parseFloat(value) + (parseFloat(value) * gst);
                    var pro_fee_gst = pro_fee_gst_raw.toFixed(2);
                    $("#pro_fee_gst").val(pro_fee_gst);

                    var amount_to_invoice_landlord_raw = parseFloat($("#pro_fee_gst").val());
                    var amount_to_invoice_landlord = amount_to_invoice_landlord_raw.toFixed(2);
                    $("#amount_to_invoice_landlord").val(amount_to_invoice_landlord);

                    var negotiator_commision_raw = parseFloat(value) * ({{ Auth::user()->commision_rate }} / 100);
                    var negotiator_commision = negotiator_commision_raw.toFixed(2);
                    $("#negotiator_commision").val(negotiator_commision);

                },
                wait: 750,
                highlight: true,
                allowSubmit: false,
                captureLength: 1
            }

            var options_stamp_duty = {
                callback: function (value) { 

                    var amount_bank_in_to_proplex = parseFloat($("#amount_bank_in_to_proplex").val());
                    var amount_to_invoice_landlord = parseFloat($("#amount_to_invoice_landlord").val());
                    var stamp_duty = parseFloat(value);
                    var negotiator_commision = parseFloat($("#negotiator_commision").val());
                    var pro_fee = parseFloat($("#pro_fee").val());
                    var gst_by_landlord_vendor = parseFloat($("#gst_by_landlord_vendor").val()) * pro_fee;

                    var balance_due_landlord_vendor_raw = amount_bank_in_to_proplex - amount_to_invoice_landlord - stamp_duty;
                    var balance_due_landlord_vendor = balance_due_landlord_vendor_raw.toFixed(2);

                    $("#balance_due_landlord_vendor").val(balance_due_landlord_vendor);

                    var amount_payable_to_negotiator_raw = negotiator_commision + stamp_duty - 10;
                    var amount_payable_to_negotiator = amount_payable_to_negotiator_raw.toFixed(2);

                    $("#amount_payable_to_negotiator").val(amount_payable_to_negotiator);

                    var balance_raw = amount_bank_in_to_proplex  - (pro_fee + stamp_duty + gst_by_landlord_vendor) - balance_due_landlord_vendor;
                    var balance = balance_raw.toFixed(2);

                    $("#balance").val(balance);


                },
                wait: 750,
                highlight: true,
                allowSubmit: false,
                captureLength: 1
            }

            $("#gst_by_landlord_vendor").on("change", function(){

                var pro_fee_gst_raw = parseFloat($('#pro_fee').val()) + (parseFloat($('#pro_fee').val() * this.value));
                var pro_fee_gst = pro_fee_gst_raw.toFixed(2);
                $("#pro_fee_gst").val(pro_fee_gst);

                var amount_to_invoice_landlord_raw = parseFloat($("#pro_fee").val()) + (parseFloat($('#pro_fee').val() * this.value));
                var amount_to_invoice_landlord = amount_to_invoice_landlord_raw.toFixed(2);
                $("#amount_to_invoice_landlord").val(amount_to_invoice_landlord);

            });

            $("#pro_fee").typeWatch( options_pro_fee );

            $("#stamp_duty").typeWatch( options_stamp_duty );

            // Internal Cobroke Calculation - DONE

            var options_coagent_portion_value = {
                callback: function (value) { 

                    var coagent_portion_type = $("#coagent_portion_type").val();
                    var coagent_portion_value = parseFloat(value);
                    // var z_value_1 = $("#z_value_1").val();

                    if(coagent_portion_type == 1)
                    {
                        var coagent_gst_by_landlord_raw = coagent_portion_value * 0.06;
                        var coagent_gst_by_landlord = coagent_gst_by_landlord_raw.toFixed(2)

                        $("#coagent_portion_amount").val(coagent_portion_value);
                        $("#coagent_gst_by_landlord").val(coagent_gst_by_landlord);
                    }
                    else if(coagent_portion_type == 2)
                    {
                        var pro_fee = parseFloat($("#pro_fee").val());

                        var coagent_portion_amount_raw = pro_fee * coagent_portion_value / 100;
                        var coagent_portion_amount = coagent_portion_amount_raw.toFixed(2);

                        var coagent_gst_by_landlord_raw = coagent_portion_amount * 0.06;
                        var coagent_gst_by_landlord = coagent_gst_by_landlord_raw.toFixed(2);

                        $("#coagent_portion_amount").val(coagent_portion_amount);

                        $("#coagent_gst_by_landlord").val(coagent_gst_by_landlord);

                    }
                    

                },
                wait: 750,
                highlight: true,
                allowSubmit: false,
                captureLength: 1
            }

            $("#coagent_portion_value").typeWatch( options_coagent_portion_value );
            //

            // EXTERNAL COBROKE - PropL collected deposit, 3rd party to invoice PropL - DONE

            var options_coagent_company_portion_value = {
                callback: function (value) { 

                    var coagent_company_portion_type = $("#coagent_company_portion_type").val();
                    var coagent_company_portion_value = parseFloat(value);
                    var gst = parseFloat($('#coagent_gst_by_landlord_vendor').val());


                    if(coagent_company_portion_type == 1)
                    {

                        var coagent_gst_by_landlord_raw = coagent_company_portion_value * gst;
                        var coagent_gst_by_landlord = coagent_gst_by_landlord_raw.toFixed(2);

                        var total_payable_to_coagent_raw = coagent_gst_by_landlord_raw + coagent_company_portion_value;
                        var total_payable_to_coagent = total_payable_to_coagent_raw.toFixed(2);

                        $("#coagent_portion_amount_2").val(coagent_company_portion_value);
                        $("#total_payable_to_coagent").val(total_payable_to_coagent); 

                    }
                    else if(coagent_company_portion_type == 2)
                    {
                        var pro_fee = parseFloat($("#pro_fee").val());

                        var coagent_portion_amount_raw = pro_fee * coagent_company_portion_value / 100;
                        var coagent_portion_amount = coagent_portion_amount_raw.toFixed(2);

                        var coagent_gst_by_landlord_raw = coagent_portion_amount * gst;
                        var coagent_gst_by_landlord = coagent_gst_by_landlord_raw.toFixed(2);

                        var total_payable_to_coagent_raw = coagent_portion_amount_raw + coagent_gst_by_landlord_raw;
                        var total_payable_to_coagent = total_payable_to_coagent_raw.toFixed(2);

                        $("#coagent_portion_amount_2").val(coagent_portion_amount_raw);

                        $("#total_payable_to_coagent").val(total_payable_to_coagent);

                    }
                    

                },
                wait: 750,
                highlight: true,
                allowSubmit: false,
                captureLength: 1
            }

            $("#coagent_company_portion_value").typeWatch( options_coagent_company_portion_value );

            $("#coagent_gst_by_landlord_vendor").on("change", function(){

               

                    var coagent_company_portion_type = $("#coagent_company_portion_type").val();
                    var coagent_company_portion_value = parseFloat($("#coagent_company_portion_value").val());
                    var gst = parseFloat(this.value);


                    if(coagent_company_portion_type == 1)
                    {

                        var coagent_gst_by_landlord_raw = coagent_company_portion_value * gst;
                        var coagent_gst_by_landlord = coagent_gst_by_landlord_raw.toFixed(2);

                        var total_payable_to_coagent_raw = coagent_gst_by_landlord_raw + coagent_company_portion_value;
                        var total_payable_to_coagent = total_payable_to_coagent_raw.toFixed(2);

                        $("#coagent_portion_amount_2").val(coagent_company_portion_value);
                        $("#total_payable_to_coagent").val(total_payable_to_coagent); 

                    }
                    else if(coagent_company_portion_type == 2)
                    {
                        var pro_fee = parseFloat($("#pro_fee").val());

                        var coagent_portion_amount_raw = pro_fee * coagent_company_portion_value / 100;
                        var coagent_portion_amount = coagent_portion_amount_raw.toFixed(2);

                        var coagent_gst_by_landlord_raw = coagent_portion_amount * gst;
                        var coagent_gst_by_landlord = coagent_gst_by_landlord_raw.toFixed(2);

                        var total_payable_to_coagent_raw = coagent_portion_amount_raw + coagent_gst_by_landlord_raw;
                        var total_payable_to_coagent = total_payable_to_coagent_raw.toFixed(2);

                        $("#coagent_portion_amount_2").val(coagent_portion_amount_raw);

                        $("#total_payable_to_coagent").val(total_payable_to_coagent);

                    }



            });

            //

            // EXTERNAL COBROKE - 3rd party collected deposit, PropL to invoice 3rd party

            var options_proplenx_portion_value_2 = {
                callback: function (value) { 

                    var proplenx_portion_type_2 = $("#proplenx_portion_type_2").val();
                    var proplenx_portion_value_2 = parseFloat(value);

                    if(proplenx_portion_type_2 == 1)
                    {

                        var coagent_company_gst_by_landlord_2_raw = proplenx_portion_value_2 * 0.06;
                        var coagent_company_gst_by_landlord_2 = coagent_company_gst_by_landlord_2_raw.toFixed(2);

                        var total_payable_to_coagent_raw = proplenx_portion_value_2 + coagent_company_gst_by_landlord_2_raw;
                        var total_payable_to_coagent = total_payable_to_coagent_raw.toFixed(2);

                        $("#coagent_company_gst_by_landlord_2").val(coagent_company_gst_by_landlord_2);
                        $("#coagent_company_total_amount_to_invoice_2").val(total_payable_to_coagent); 

                    }
                    else if(proplenx_portion_type_2 == 2)
                    {
                        var pro_fee = parseFloat($("#pro_fee").val());

                        var coagent_portion_amount_2_raw = pro_fee * proplenx_portion_value_2 / 100;
                        var coagent_portion_amount_2 = coagent_portion_amount_2_raw.toFixed(2);

                        var coagent_gst_by_landlord_2_raw = coagent_portion_amount_2 * 0.06;
                        var coagent_gst_by_landlord_2 = coagent_gst_by_landlord_2_raw.toFixed(2);

                        var total_payable_to_coagent_raw = coagent_portion_amount_2_raw + coagent_gst_by_landlord_2_raw;
                        var total_payable_to_coagent = total_payable_to_coagent_raw.toFixed(2);

                        $("#coagent_company_gst_by_landlord_2").val(coagent_gst_by_landlord_2);
                        $("#coagent_company_total_amount_to_invoice_2").val(total_payable_to_coagent); 

                    }
                    

                },
                wait: 750,
                highlight: true,
                allowSubmit: false,
                captureLength: 1
            }

            $("#proplenx_portion_value_2").typeWatch( options_proplenx_portion_value_2 );

            //

            // INTERNAL REFERRAL - DONE

            var options_internal_referrel_portion_value = {
                callback: function (value) { 

                    var internal_referrel_portion_type = $("#internal_referrel_portion_type").val();
                    var internal_referrel_portion_value = parseFloat(value);

                    if(internal_referrel_portion_type == 1)
                    {

                        var internal_referrel_gst_raw = internal_referrel_portion_value * 0.06;
                        var internal_referrel_gst = internal_referrel_gst_raw.toFixed(2);

                        var internal_referrel_total_paid_raw = internal_referrel_portion_value + internal_referrel_gst_raw;
                        var internal_referrel_total_paid = internal_referrel_total_paid_raw.toFixed(2);

                        $("#internal_referrel_gst").val(internal_referrel_gst);
                        $("#internal_referrel_total_paid").val(internal_referrel_total_paid); 

                    }
                    else if(internal_referrel_portion_type == 2)
                    {
                        var pro_fee = parseFloat($("#pro_fee").val());

                        var internal_referrel_amount_2_raw = pro_fee * internal_referrel_portion_value / 100;
                        var internal_referrel_amount_2 = internal_referrel_amount_2_raw.toFixed(2);

                        var internal_referrel_gst_raw = internal_referrel_amount_2_raw * 0.06;
                        var internal_referrel_gst = internal_referrel_gst_raw.toFixed(2);

                        var internal_referrel_total_paid_raw = internal_referrel_amount_2_raw + internal_referrel_gst_raw;
                        var internal_referrel_total_paid = internal_referrel_total_paid_raw.toFixed(2);

                        $("#internal_referrel_gst").val(internal_referrel_gst);
                        $("#internal_referrel_total_paid").val(internal_referrel_total_paid); 

                    }
                    

                },
                wait: 750,
                highlight: true,
                allowSubmit: false,
                captureLength: 1
            }

            $("#internal_referrel_portion_value").typeWatch( options_internal_referrel_portion_value );

            //

            // EXTERNAL REFERRAL - DONE

            var options_external_referrel_portion_value = {
                callback: function (value) { 

                    var external_referrel_portion_type = $("#external_referrel_portion_type").val();
                    var external_referrel_portion_value = parseFloat(value);

                    if(external_referrel_portion_type == 1)
                    {

                        var external_referrel_gst_raw = external_referrel_portion_value * 0.06;
                        var external_referrel_gst = external_referrel_gst_raw.toFixed(2);

                        var external_referrel_total_paid_raw = external_referrel_portion_value + external_referrel_gst_raw;
                        var external_referrel_total_paid = external_referrel_total_paid_raw.toFixed(2);

                        $("#external_referrel_gst").val(external_referrel_gst);
                        $("#external_referrel_total_paid").val(external_referrel_total_paid); 

                    }
                    else if(external_referrel_portion_type == 2)
                    {
                        var pro_fee = parseFloat($("#pro_fee").val());

                        var external_referrel_amount_2_raw = pro_fee * external_referrel_portion_value / 100;
                        var external_referrel_amount_2 = external_referrel_amount_2_raw.toFixed(2);

                        var external_referrel_gst_raw = external_referrel_amount_2_raw * 0.06;
                        var external_referrel_gst = external_referrel_gst_raw.toFixed(2);

                        var external_referrel_total_paid_raw = external_referrel_amount_2_raw + external_referrel_gst_raw;
                        var external_referrel_total_paid = external_referrel_total_paid_raw.toFixed(2);

                        $("#external_referrel_gst").val(external_referrel_gst);
                        $("#external_referrel_total_paid").val(external_referrel_total_paid); 

                    }
                    

                },
                wait: 750,
                highlight: true,
                allowSubmit: false,
                captureLength: 1
            }

            $("#external_referrel_portion_value").typeWatch( options_external_referrel_portion_value );

        });
        </script>
        <script type="text/javascript">
            function addDoc(i)
            {
                var unix = Math.round(+new Date()/1000);

                var html = '<div class="row remove'+ unix +'"> <div class="col-md-5"> <div class="form-group xs-pt-10"> <label>Document</label> <input type="file" name="documents[]" class="form-control" /> </div> </div> <div class="col-md-5"> <div class="form-group xs-pt-10"> <label>Type</label> <select class="form-control" name="documents_type[]" id="document_type"> <option selected="selected" value="">Select</option> <option value="Bank in Slip">Bank in Slip</option> <option value="Booking Form">Booking Form</option> <option value="Stamped Agreement Relevant Pages">Stamped Agreement Relevant Pages</option> <option value="Third Party Invoice">Third Party Invoice</option> <option value="Coagency Nego Name Card">Coagency Nego Name Card</option> <option value="GST Bank In Slip">GST Bank In Slip</option> <option value="Coagency Letter">Coagency Letter</option> <option value="Others">Others</option> </select> </div> </div> <div class="col-md-2"> <label></label><br /><br /> <button type="button" class="btn btn-xl btn-success" onclick="addDoc('+ unix +');">&nbsp;<i class="mdi mdi-plus"></i>&nbsp;</button> <button type="button" class="btn btn-xl btn-danger" onclick="removeDoc('+ unix +');">&nbsp;<i class="mdi mdi-minus"></i>&nbsp;</button></div> </div>';

                $(".document_lists").append(html);
            }
            function removeDoc(i)
            {
                $(".remove"+i).remove();
            }
        </script>
    </body>
</html>