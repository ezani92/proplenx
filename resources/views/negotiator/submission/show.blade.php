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
                            <h2>FORM CODE : {{ $submission->form_code }} <button data-toggle="modal" data-target="#md-default" class="btn btn-info">Update Status</button> <button data-toggle="modal" data-target="#md-download" class="btn btn-success">Download</button> </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default panel-border-color panel-border-color-primary">
                                <div class="panel-body">
                                    <br />
                                    <table id="submission-table" class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="40%"><strong>Agent ID</strong></td>
                                                <td>{{ $submission->user->agent_code }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Submission Type</strong></td>
                                                <td>{{ $submission->submission_type }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Co Agency</strong></td>
                                                <td>
                                                    @if($submission->co_agency == 1)
                                                        No
                                                    @elseif($submission->co_agency == 2)
                                                        Internal CoAgency
                                                    @elseif($submission->co_agency == 3)
                                                        Proplenx Collect Deposit. Third Party To Invoice Proplenx
                                                    @elseif($submission->co_agency == 4)
                                                        CoNegotiator Collect Deposit. Proplenx To Invoice CoNegotiator
                                                    @elseif($submission->co_agency == 5)
                                                        Internal Referral
                                                    @elseif($submission->co_agency == 6)
                                                        External Referral
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Status</strong></td>
                                                <td>
                                                    @if($submission->status == 1)
                                                        <span class="label label-default">Pending / Outstanding</span>
                                                    @elseif($submission->status == 2)
                                                        <span class="label label-default">CoNegotiator Invoice</span>
                                                    @elseif($submission->status == 3)
                                                        <span class="label label-default">CoAgency Payment</span>
                                                    @elseif($submission->status == 4)
                                                        <span class="label label-default">Referral Invoice</span>
                                                    @elseif($submission->status == 5)
                                                        <span class="label label-default">Bank-in Slip</span>
                                                    @elseif($submission->status == 6)
                                                        <span class="label label-default">Payment from Landlord</span>
                                                    @elseif($submission->status == 7)
                                                        <span class="label label-default">Negotiator Refer Remark </span>
                                                    @elseif($submission->status == 8)
                                                        <span class="label label-default">Admin Refer Remark</span>
                                                    @elseif($submission->status == 9)
                                                        <span class="label label-danger">Aborted</span>
                                                    @elseif($submission->status == 10)
                                                        <span class="label label-default">Ready for Commission Payment</span>
                                                    @elseif($submission->status == 11)
                                                        <span class="label label-success">Paid</span>
                                                    @elseif($submission->status == 12)
                                                        <span class="label label-default">Admin to Issue Invoice &/or Receipt </span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @if($submission->submission_type == 'Rent')
                                            <tr>
                                                <td><strong>Rental Expiry Date</strong></td>
                                                <td>{{ $submission->rental_expiry_date }}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td><strong>Property Address</strong></td>
                                                <td>{{ $submission->property_address }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Selling / Rental Price</strong></td>
                                                <td>RM {{ $submission->selling_rental_price }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Amount Banked in to Proplenx</strong></td>
                                                <td>RM {{ $submission->amount_bank_in_to_proplex }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Professional Fee</strong></td>
                                                <td>RM {{ $submission->pro_fee }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Professional Fee Including GST</strong></td>
                                                <td>RM {{ $submission->pro_fee_gst }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>GST by Landlord/ Vendor</strong></td>
                                                <td>RM {{ $submission->gst_by_landlord_vendor }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Amount to Invoice Landlord/ Vendor </strong></td>
                                                <td>RM {{ $submission->amount_to_invoice_landlord }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Stamp Duty and Tenancy Preparation Fee or Other Reimbursement Fees</strong></td>
                                                <td>RM {{ $submission->stamp_duty }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Negotiator's Commission & Marketing Fees</strong></td>
                                                <td>RM {{ $submission->negotiator_commision }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Balance Due to Landlord / Vendor</strong></td>
                                                <td>RM {{ $submission->balance_due_landlord_vendor }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Amount Payable to Negotiator</strong></td>
                                                <td>RM {{ $submission->amount_payable_to_negotiator }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Balance </strong></td>
                                                <td>RM {{ $submission->balance }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default panel-border-color panel-border-color-primary">
                                <div class="panel-body">
                                    <h4>Landlord / Vendor Details <a href="{{ url('negotiator/submission/1/edit') }}" class="btn btn-info pull-right">Edit</a></h4>
                                    <br />
                                    <table id="submission-table" class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><strong>Fullname / Company Name</strong></td>
                                                <td>{{ $submission->landlord_vendor_name }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>NRIC / Company No</strong></td>
                                                <td>{{ $submission->landlord_vendor_ic_no }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Correspondence Address</strong></td>
                                                <td>{{ $submission->landlord_vendor_address }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Bank Name</strong></td>
                                                <td>{{ $submission->landlord_vendor_bank_name }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Bank Account No. </strong></td>
                                                <td>{{ $submission->landlord_vendor_acc_no }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br />
                                    <hr />
                                    <h4>Tenant / Purchaser Details <a href="{{ url('negotiator/submission/1/edit') }}" class="btn btn-info pull-right">Edit</a></h4>
                                    <br />
                                    <table id="submission-table" class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><strong>Fullname / Company Name</strong></td>
                                                <td>{{ $submission->tennant_purchaser_name }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>NRIC / Company No</strong></td>
                                                <td>{{ $submission->tennant_purchaser_ic_no }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Address</strong></td>
                                                <td>{{ $submission->tennant_purchaser_address }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Bank Name</strong></td>
                                                <td>{{ $submission->tennant_purchaser_bank_name }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Bank Account No. </strong></td>
                                                <td>{{ $submission->tennant_purchaser_acc_no }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($submission->co_agency == 2)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default panel-border-color panel-border-color-primary">
                                    <div class="panel-body">
                                        <h4>Internal Cobroke</h4>
                                        <br />
                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Negotiator Name</strong></td>
                                                    <td>{{ \App\User::find($submission->coagent_id)->name }}</td>
                                                </tr>
                                                @if($submission->coagent_portion_type == 1)
                                                    <tr>
                                                        <td><strong>CoAgent Portion Type</strong></td>
                                                        <td>Fixed</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>CoAgent Portion Value</strong></td>
                                                        <td>RM {{ $submission->coagent_portion_value }}</td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td><strong>CoAgent Portion Type</strong></td>
                                                        <td>Percentage</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>CoAgent Portion Value</strong></td>
                                                        <td>{{ $submission->coagent_portion_value }} %</td>
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <td><strong>GST by Landlord/ Vendor</strong></td>
                                                    <td>RM {{ $submission->coagent_gst_by_landlord }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br />
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default panel-border-color panel-border-color-primary">
                                <div class="panel-body">
                                    <h4>Documents</h4>
                                    <br />
                                    <ul>
                                        @foreach($submission->documents as $document)
                                            <li><a target="_blank" href="{{ secure_asset('storage/'.$document->filename) }}">{{ $document->original_name }}</a></li>
                                        @endforeach
                                    </ul>
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div id="md-default" tabindex="-1" role="dialog" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Update Submission Status</h3>
                        </div>
                        <div class="modal-body">
                            <div class="">
                                <form>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1">Pending</option>
                                            <option value="2">Pending/ Outstanding CoNegotiator Invoice</option>
                                            <option value="3">Pending/ Outstanding CoAgency Payment</option>
                                            <option value="4">Pending/ Outstanding Referral Invoice</option>
                                            <option value="5">Pending/ Outstanding Bank-in Slip</option>
                                            <option value="6">Payment from Landlord</option>
                                            <option value="7">Negotiator Refer Remark </option>
                                            <option value="8">Admin Refer Remark</option>
                                            <option value="9">Aborted</option>
                                            <option value="10">Ready for Commission Payment </option>
                                            <option value="11">Paid</option>
                                            <option value="12">Admin to Issue Invoice &/or Receipt </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Documents</label>
                                        <input type="file" class="form-control" name="document">
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <textarea class="form-control"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>
            <div id="md-download" tabindex="-1" role="dialog" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Download</h3>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group">
                                <li class="list-group-item">Coagent Invoice <code>Features Not Ready Yet</code></li>
                                <li class="list-group-item">Commision Invoice<code>Features Not Ready Yet</code></li>
                                <li class="list-group-item">Payment Voucher Commision<code>Features Not Ready Yet</code></li>
                                <li class="list-group-item">Payment Voucher Stamp Dudy<code>Features Not Ready Yet</code></li>
                                <li class="list-group-item">Receipt <code>Features Not Ready Yet</code></li>
                            </ul>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>
        </div>
        @include('negotiator.footer')
        <script type="text/javascript">
            $("#status").val({{$submission->status}});
        </script>
    </body>
</html>