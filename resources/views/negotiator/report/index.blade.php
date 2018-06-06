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
                            <h3>Reports <a href="{{ url('negotiator/report/export') }}" class="btn btn-success pull-right">Export As Excel</a></h3>
                        </div>
                    </div>

                    <hr />

                    <form method="get">
                        <div class="row">
                            @php
                            if(isset($input['date_from']))
                            {
                            $date_from= $input['date_from'];
                            $date_to = $input['date_to'];
                            }
                            else
                            {
                            $date_from = '';
                            $date_to = '';
                            }
                            @endphp
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>From</label>
                                    <input autocomplete="off" type="text" id="date_from" name="date_from" class="form-control datepicker" value="{{ $date_from }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>To</label>
                                    <input autocomplete="off" type="text" id="date_to" name="date_to" value="{{ $date_to }}" class="form-control datepicker" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-block">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default panel-border-color panel-border-color-primary">
                                <div class="panel-body">
                                    <br />
                                    <table id="games-table" class="table table-striped table-hover table-fw-widget">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Form Code</th>
                                                <th>Customer Name</th>
                                                <th>Address</th>
                                                <th>Rental Expiry Date</th>
                                                <th>Nego Name</th>
                                                <th>Bank In Amount</th>
                                                <th>Professional Fees</th>
                                                <th>Nego Incentive</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if($submissions->count() > 0)
                                            @foreach($submissions as $submission)
                                            <tr>
                                                <td>{{ $submission->created_at->format('d M Y') }}</td>
                                                <td>{{ $submission->form_code }}</td>
                                                <td>{{ $submission->landlord_vendor_name }}</td>
                                                <td>{{ $submission->property_address }}</td>
                                                <td>{{ $submission->rental_expiry_date }}</td>
                                                <td>{{ $submission->user->name }}</td>
                                                <td>RM {{ $submission->amount_bank_in_to_proplex }}</td>
                                                <td>RM {{ $submission->pro_fee }}</td>
                                                <td>RM {{ $submission->negotiator_commision }}</td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="9">No data available</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                    {{ $submissions->appends(Request::except('page'))->links() }}
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @include('negotiator.footer')
        <script type="text/javascript">
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy',
                maxViewMode: 3
            });
        </script>
        @if(isset($_GET['date_from']))
        <script type="text/javascript">
            
            $("#date_from").val('{{ $_GET['date_from'] }}');
            $("#date_to").val('{{ $_GET['date_to'] }}');
        </script>
        @endif
    </body>
</html>