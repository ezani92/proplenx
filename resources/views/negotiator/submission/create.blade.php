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
                                                        <select class="form-control" name="submission_type">
                                                            <option>Select</option>
                                                            <option value="Sale">Sale</option>
                                                            <option value="Rent">Rent</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Co-Agency</label>
                                                        <select class="form-control" name="co_agency">
                                                            <option value="1">No</option>
                                                            <option value="2">Internal CoAgency</option>
                                                            <option value="3">Proplenx Collect Deposit. Third Party To Invoice Proplenx</option>
                                                            <option value="4">CoNegotiator Collect Deposit. Proplenx To Invoice CoNegotiator</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Referral</label>
                                                        <select class="form-control" name="referral">
                                                            <option value="1">Internal Referral</option>
                                                            <option value="2">External Referral</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Status</label>
                                                        <select class="form-control" name="referral">
                                                            <option value="1">Pending/ Outstanding </option>
                                                            <option value="2">CoNegotiator Invoice</option>
                                                            <option value="2">CoAgency Payment</option>
                                                            <option value="2">Referral Invoice</option>
                                                            <option value="2">Bank-in Slip</option>
                                                            <option value="2">Payment from Landlord</option>
                                                            <option value="2">Negotiator Refer Remark </option>
                                                            <option value="2">Admin Refer Remark</option>
                                                            <option value="2">Aborted</option>
                                                            <option value="2">Ready for Commission Payment </option>
                                                            <option value="2">Paid</option>
                                                            <option value="2">Admin to Issue Invoice &/or Receipt </option>
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
                                                        <input type="text" name="form_code" class="form-control">
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
                                                    <label>Full Property Express</label>
                                                    <textarea class="form-control" name="property_address"></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Selling / Rental Price</label>
                                                        <input type="text" name="selling_rental_price" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Amount Bank In To Proplex</label>
                                                        <input type="number" step="0.01" id="amount_bank_in_to_proplex" name="amount_bank_in_to_proplex" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Professional Fee (RM)</label>
                                                        <input type="number" step="0.01" id="pro_fee" name="pro_fee" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label>Professional Fee With GST (RM)</label>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @include('negotiator.footer')
        <script type="text/javascript">

        $( document ).ready(function() {

            $('.datepicker').datepicker({
                format: 'mm/dd/yyyy',
                maxViewMode: 3
            });

            var options_pro_fee = {
                callback: function (value) { 

                    var pro_fee_gst_raw = parseFloat(value) + (parseFloat(value) * (6/100));
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

        });
        </script>
    </body>
</html>