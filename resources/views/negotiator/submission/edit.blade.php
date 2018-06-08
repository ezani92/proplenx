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
                        <form method="post" action="{{ url('negotiator/submission/'.$submission->id.'/update') }}" enctype="multipart/form-data">
                        @method('patch')
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Edit Submission [{{ $submission->form_code }}]</h3>

                                    <div class="panel panel-border-color panel-border-color-primary">
                                        <div class="panel-heading">Landlord / Vendor Details</div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Fullname / Company Name</strong></label>
                                                        <input value="{{ $submission->landlord_vendor_name }}" type="text" name="landlord_vendor_name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>NRIC / Company No</strong></label>
                                                        <input value="{{ $submission->landlord_vendor_ic_no }}" type="text" name="landlord_vendor_ic_no" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Correspondence Address</strong></label>
                                                        <textarea class="form-control" name="landlord_vendor_address" required>{{ $submission->landlord_vendor_address }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Bank Name</strong></label>
                                                        {{ Form::select('landlord_vendor_bank_name', [
                                                            'Maybank' => 'Maybank',
                                                            'CIMB' => 'CIMB',
                                                            'Public Bank Berhad' => 'Public Bank Berhad',
                                                            'RHB Bank' => 'RHB Bank',
                                                            'Hong Leong Bank' => 'Hong Leong Bank',
                                                            'AmBank' => 'AmBank',
                                                            'United Overseas Bank' => 'United Overseas Bank',
                                                            'Bank Rakyat' => 'Bank Rakyat',
                                                            'OCBC Bank' => 'OCBC Bank',
                                                            'HSBC' => 'HSBC',
                                                            'Bank Islam' => 'Bank Islam',
                                                            'Bank Simpanan Nasional' => 'Bank Simpanan Nasional',
                                                            'Affin Bank' => 'Affin Bank',
                                                        ], $submission->landlord_vendor_bank_name, ['class' => 'form-control']) }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Bank Account No.</strong></label>
                                                        <input value="{{ $submission->landlord_vendor_acc_no }}" type="text" name="landlord_vendor_acc_no" class="form-control" required>
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
                                                        <input type="text" name="tennant_purchaser_name" value="{{ $submission->tennant_purchaser_name }}" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>NRIC / Company No</strong></label>
                                                        <input type="text" name="tennant_purchaser_ic_no" value="{{ $submission->tennant_purchaser_ic_no }}" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Address</strong></label>
                                                        <textarea class="form-control" name="tennant_purchaser_address" required>{{ $submission->tennant_purchaser_address }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Bank Name</strong></label>
                                                        {{ Form::select('tennant_purchaser_bank_name', [
                                                            'Maybank' => 'Maybank',
                                                            'CIMB' => 'CIMB',
                                                            'Public Bank Berhad' => 'Public Bank Berhad',
                                                            'RHB Bank' => 'RHB Bank',
                                                            'Hong Leong Bank' => 'Hong Leong Bank',
                                                            'AmBank' => 'AmBank',
                                                            'United Overseas Bank' => 'United Overseas Bank',
                                                            'Bank Rakyat' => 'Bank Rakyat',
                                                            'OCBC Bank' => 'OCBC Bank',
                                                            'HSBC' => 'HSBC',
                                                            'Bank Islam' => 'Bank Islam',
                                                            'Bank Simpanan Nasional' => 'Bank Simpanan Nasional',
                                                            'Affin Bank' => 'Affin Bank',
                                                        ], $submission->tennant_purchaser_bank_name, ['class' => 'form-control']) }}
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group xs-pt-10">
                                                        <label><strong>Bank Account No.</strong></label>
                                                        <input type="text" name="tennant_purchaser_acc_no" value="{{ $submission->tennant_purchaser_acc_no }}" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    @csrf
                                    <button type="submit" class="btn btn-block btn-info">Update Form</button>


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

                    var balance_raw = amount_bank_in_to_proplex - pro_fee + stamp_duty + gst_by_landlord_vendor - balance_due_landlord_vendor;
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

                var html = '<div class="row remove'+ unix +'"> <div class="col-md-5"> <div class="form-group xs-pt-10"> <label>Document</label> <input type="file" name="documents[]" class="form-control" /> </div> </div> <div class="col-md-5"> <div class="form-group xs-pt-10"> <label>Type</label> <input type="text" name="documents_type[]" class="form-control" placeholder="Bank In Slip / Offer Letter / 3rd Party Invoice / Others" /> </div> </div> <div class="col-md-2"> <label></label><br /><br /> <button type="button" class="btn btn-xl btn-success" onclick="addDoc('+ unix +');">&nbsp;<i class="mdi mdi-plus"></i>&nbsp;</button> <button type="button" class="btn btn-xl btn-danger" onclick="removeDoc('+ unix +');">&nbsp;<i class="mdi mdi-minus"></i>&nbsp;</button></div> </div>';

                $(".document_lists").append(html);
            }
            function removeDoc(i)
            {
                $(".remove"+i).remove();
            }
        </script>
    </body>
</html>