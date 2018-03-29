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
                                                        <label>Submission Type</label>
                                                        <select class="form-control" name="submission_type" required>
                                                            <option value="">Select</option>
                                                            <option value="Sale">Sale</option>
                                                            <option value="Rent">Rent</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Co-Agency</label>
                                                        <select class="form-control" name="co_agency" id="co_agency" required>
                                                            <option value="1">No</option>
                                                            <option value="2">Internal CoAgency</option>
                                                            <option value="3">Proplenx Collect Deposit. Third Party To Invoice Proplenx</option>
                                                            <option value="4">CoNegotiator Collect Deposit. Proplenx To Invoice CoNegotiator</option>
                                                            <option value="5">Internal Referral</option>
                                                            <option value="6">External Referral</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Status</label>
                                                        <select class="form-control" name="status" required>
                                                            <option value="1">Pending/ Outstanding </option>
                                                            <option value="2">- CoNegotiator Invoice</option>
                                                            <option value="3">- CoAgency Payment</option>
                                                            <option value="4">- Referral Invoice</option>
                                                            <option value="5">- Bank-in Slip</option>
                                                            <option value="6">- Payment from Landlord</option>
                                                            <option value="7">Negotiator Refer Remark </option>
                                                            <option value="8">Admin Refer Remark</option>
                                                            <option value="9">Aborted</option>
                                                            <option value="10">Ready for Commission Payment </option>
                                                            <option value="11">Paid</option>
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
                                                        <label>Form Code *</label>
                                                        <input type="text" name="form_code" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Rental Expiry Date</label>
                                                        <input type="text" value="" class="form-control datepicker" name="rental_expiry_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Full Property Address</label>
                                                    <textarea class="form-control" name="property_address" required></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Selling / Rental Price</label>
                                                        <input type="text" name="selling_rental_price" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Amount Banked In To Proplenx</label>
                                                        <input type="number" step="0.01" id="amount_bank_in_to_proplex" name="amount_bank_in_to_proplex" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Professional Fee (RM)</label>
                                                        <input type="number" step="0.01" id="pro_fee" name="pro_fee" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Professional Fee has included 6% GST</label>
                                                        <input type="number" id="pro_fee_gst" class="form-control" name="pro_fee_gst" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>GST by Landlord/ Vendor (RM)</label>
                                                        <input type="number" step="0.01" id="gst_by_landlord_vendor" name="gst_by_landlord_vendor" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Amount to Invoice Landlord/ Vendor (RM)</label>
                                                        <input type="number" tep="0.01" id="amount_to_invoice_landlord" name="amount_to_invoice_landlord" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Stamp Duty and Tenancy Preparation Fee or Other Reimbursement Fees (RM)</label>
                                                        <input type="number" step="0.01" id="stamp_duty" name="stamp_duty" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Negotiator's Commission & Marketing Fees (RM)</label>
                                                        <input type="number" step="0.01" id="negotiator_commision" name="negotiator_commision" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Balance Due to Landlord / Vendor</label>
                                                        <input type="number" tep="0.01" id="balance_due_landlord_vendor" name="balance_due_landlord_vendor" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Amount Payable to Negotiator (RM)</label>
                                                        <input type="number" step="0.01" id="amount_payable_to_negotiator" name="amount_payable_to_negotiator" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Balance (RM)</label>
                                                        <input type="number" tep="0.01" id="balance" name="balance" class="form-control" readonly="true">
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
                                                        <label>Fullname / Company Name</label>
                                                        <input type="text" name="landlord_vendor_name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>NRIC / Company No</label>
                                                        <input type="text" name="landlord_vendor_ic_no" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Correspondence Address</label>
                                                        <textarea class="form-control" name="landlord_vendor_address" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Bank Name</label>
                                                        <input type="text" name="landlord_vendor_bank_name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Bank Account No.</label>
                                                        <input type="text" name="landlord_vendor_acc_no" class="form-control" required>
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
                                                        <label>Fullname / Company Name</label>
                                                        <input type="text" name="tennant_purchaser_name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>NRIC / Company No</label>
                                                        <input type="text" name="tennant_purchaser_ic_no" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Address</label>
                                                        <textarea class="form-control" name="tennant_purchaser_address" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Bank Name</label>
                                                        <input type="text" name="tennant_purchaser_bank_name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Bank Account No.</label>
                                                        <input type="text" name="tennant_purchaser_acc_no" class="form-control" required>
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
                                                        <label>Negotiator Name</label>
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
                                                        <label>CoAgent Portion Type</label>
                                                        <select class="form-control" name="coagent_portion_type" id="coagent_portion_type">
                                                            <option value="1">Fixed Amount (RM)</option>
                                                            <option value="2">Percentage</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>CoAgent Portion Value</label>
                                                        <input type="number" step="0.01" name="coagent_portion_value" id="coagent_portion_value" placeholder="no need to type RM or % (if type percentage)" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label>CoAgent Portion Amount</label>
                                                        <input type="text" name="coagent_portion_amount" id="coagent_portion_amount" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label>GST by Landlord/ Vendor</label>
                                                        <input type="text" name="coagent_gst_by_landlord" id="coagent_gst_by_landlord" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="display: none;" id="external-cobroke-1" class="panel panel-border-color panel-border-color-primary">
                                        <div class="panel-heading">External Cobroke - Proplenx collected deposit, 3rd party to invoice Proplenx</div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label>CoAgent Company Name</label>
                                                        <input type="text" name="coagent_company_name" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>CoAgent Company Portion Type</label>
                                                        <select class="form-control" name="coagent_company_portion_type" id="coagent_company_portion_type">
                                                            <option value="1">Fixed Amount (RM)</option>
                                                            <option value="2">Percentage</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>CoAgent Company Portion Value</label>
                                                        <input type="number" step="0.01" name="coagent_company_portion_value" id="coagent_company_portion_value" placeholder="no need to type RM or % (if type percentage)" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label>CoAgent Portion Amount</label>
                                                        <input type="text" name="coagent_portion_amount_2" id="coagent_portion_amount_2" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>CoAgent Company Bank Name</label>
                                                        <input type="text" name="coagent_company_bank_name" id="coagent_company_bank_name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>CoAgent Company Bank Account No</label>
                                                        <input type="text" name="coagent_company_bank_acc_no" id="coagent_company_bank_acc_no" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Total Payable to CoAgent</label>
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
                                                        <label>CoAgent Company Name</label>
                                                        <input type="text" name="coagent_company_name_2" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>CoAgent Company Email</label>
                                                        <input type="text" name="coagent_company_email_2" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>PropLenx Portion</label>
                                                        <select class="form-control" name="proplenx_portion_type_2" id="proplenx_portion_type_2">
                                                            <option value="1">Fixed Amount (RM)</option>
                                                            <option value="2">Percentage</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>PropLenx Portion Value</label>
                                                        <input type="number" step="0.01" name="proplenx_portion_value_2" id="proplenx_portion_value_2" placeholder="no need to type RM or % (if type percentage)" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>GST by Landlord/ Vendor</label>
                                                        <input type="text" name="coagent_company_gst_by_landlord_2" id="coagent_company_gst_by_landlord_2" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Total Amount to Invoice</label>
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
                                                        <label>Referral Name</label>
                                                        <input type="text" name="internal_referrel_name" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Referral Bank Name</label>
                                                        <input type="text" class="form-control" name="internal_referrel_bankname" id="internal_referrel_bankname">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Referral Bank Account No</label>
                                                        <input type="number" name="internal_referrel_bankacc" id="internal_referrel_bankacc" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Referral Portion Type</label>
                                                        <select class="form-control" name="internal_referrel_portion_type" id="internal_referrel_portion_type">
                                                            <option value="1">Fixed Amount (RM)</option>
                                                            <option value="2">Percentage</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Referral Portion Value</label>
                                                        <input type="number" step="0.01" name="internal_referrel_portion_value" id="internal_referrel_portion_value" placeholder="no need to type RM or % (if type percentage)" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>GST by Referral (if any)</label>
                                                        <input type="text" name="internal_referrel_gst" id="internal_referrel_gst" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Total Payable to Referral</label>
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
                                                        <label>Referral Name</label>
                                                        <input type="text" name="external_referrel_name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Referral IC No.</label>
                                                        <input type="text" name="external_referrel_ic" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Referral Correspondence Address</label>
                                                        <textarea name="external_referrel_address" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Referral Bank Name</label>
                                                        <input type="text" class="form-control" name="external_referrel_bankname" id="external_referrel_bankname">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Referral Bank Account No</label>
                                                        <input type="number" name="external_referrel_bankacc" id="external_referrel_bankacc" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Referral Portion Type</label>
                                                        <select class="form-control" name="external_referrel_portion_type" id="external_referrel_portion_type">
                                                            <option value="1">Fixed Amount (RM)</option>
                                                            <option value="2">Percentage</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Referral Portion Value</label>
                                                        <input type="number" step="0.01" name="external_referrel_portion_value" id="external_referrel_portion_value" placeholder="no need to type RM or % (if type percentage)" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>GST by Referral (if any)</label>
                                                        <input type="text" name="external_referrel_gst" id="external_referrel_gst" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Total Payable to Referral</label>
                                                        <input type="text" name="external_referrel_total_paid" id="external_referrel_total_paid" class="form-control" readonly="true">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="supporting-document" class="panel panel-border-color panel-border-color-primary">
                                        <div class="panel-heading">Supporting Document</div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <input type="file" name="documents[]" id="" class="multifile" />
                                                        <br />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @csrf
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

                    var pro_fee_gst_raw = parseFloat(value);
                    var pro_fee_gst = pro_fee_gst_raw.toFixed(2);
                    $("#pro_fee_gst").val(pro_fee_gst);

                    var gst_by_landlord_vendor_raw = parseFloat(value) * (6/100);
                    var gst_by_landlord_vendor = gst_by_landlord_vendor_raw.toFixed(2);
                    $("#gst_by_landlord_vendor").val(gst_by_landlord_vendor);

                    var amount_to_invoice_landlord_raw = parseFloat($("#pro_fee_gst").val()) + parseFloat($("#gst_by_landlord_vendor").val());
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
                    var gst_by_landlord_vendor = parseFloat($("#gst_by_landlord_vendor").val());

                    var balance_due_landlord_vendor_raw = amount_bank_in_to_proplex - amount_to_invoice_landlord - stamp_duty;
                    var balance_due_landlord_vendor = balance_due_landlord_vendor_raw.toFixed(2);

                    $("#balance_due_landlord_vendor").val(balance_due_landlord_vendor);

                    var amount_payable_to_negotiator_raw = negotiator_commision + stamp_duty - 10;
                    var amount_payable_to_negotiator = amount_payable_to_negotiator_raw.toFixed(2);

                    $("#amount_payable_to_negotiator").val(amount_payable_to_negotiator);

                    var balance_raw = amount_bank_in_to_proplex - pro_fee + stamp_duty + gst_by_landlord_vendor - balance_due_landlord_vendor;
                    var balance = balance_raw.toFixed(2);

                    $("#balance").val(balance);


                },
                wait: 750,
                highlight: true,
                allowSubmit: false,
                captureLength: 1
            }

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

                    var coagent_company_portion_type_2 = $("#coagent_company_portion_type_2").val();
                    var coagent_company_portion_value_2 = parseFloat(value);

                    if(coagent_company_portion_type_2 == 1)
                    {

                        var coagent_gst_by_landlord_raw = coagent_company_portion_value_2 * 0.06;
                        var coagent_gst_by_landlord = coagent_gst_by_landlord_raw.toFixed(2);

                        var total_payable_to_coagent_raw = coagent_gst_by_landlord_raw + coagent_company_portion_value_2;
                        var total_payable_to_coagent = total_payable_to_coagent_raw.toFixed(2);

                        $("#coagent_portion_amount_2").val(total_payable_to_coagent);
                        $("#total_payable_to_coagent").val(total_payable_to_coagent); 

                    }
                    else if(coagent_company_portion_type_2 == 2)
                    {
                        var pro_fee = parseFloat($("#pro_fee").val());

                        var coagent_portion_amount_2_raw = pro_fee * coagent_company_portion_value_2 / 100;
                        var coagent_portion_amount_2 = coagent_portion_amount_2_raw.toFixed(2);

                        var coagent_gst_by_landlord_2_raw = coagent_portion_amount_2 * 0.06;
                        var coagent_gst_by_landlord_2 = coagent_gst_by_landlord_2_raw.toFixed(2);

                        var total_payable_to_coagent_raw = coagent_portion_amount_2_raw + coagent_gst_by_landlord_2_raw;
                        var total_payable_to_coagent = total_payable_to_coagent_raw.toFixed(2);

                        $("#coagent_portion_amount").val(total_payable_to_coagent);

                        $("#total_payable_to_coagent").val(total_payable_to_coagent);

                    }
                    

                },
                wait: 750,
                highlight: true,
                allowSubmit: false,
                captureLength: 1
            }

            $("#coagent_company_portion_value").typeWatch( options_coagent_company_portion_value );

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
    </body>
</html>