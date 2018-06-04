<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.header')
        @if(!isset($_GET['type']))
            @php
                $submission_type = 'all';
            @endphp
        @else
            @if($_GET['type'] == 'pending')
                @php
                    $submission_type = 'pending';
                @endphp
            @elseif($_GET['type'] == 'processing')
                @php
                    $submission_type = 'processing';
                @endphp
            @elseif($_GET['type'] == 'paid')
                @php
                    $submission_type = 'paid';
                @endphp
            @endif
        @endif
            <div class="be-content">
                <div class="main-content container-fluid">
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif

                    <div class="row">
                         <div class="col-md-12">
                            <h3>[{{ $submission_type }}] Case Submission List's</h3>
                            <div class="panel panel-default panel-border-color panel-border-color-primary">
                                <div class="panel-body">
                                    <br />
                                    <table id="submission-table" class="table table-striped table-hover table-fw-widget">
                                        <thead>
                                            <tr>
                                                <th>Negotiator ID</th>
                                                <th>Negotiator Name</th>
                                                <th>Form Code</th>
                                                <th>Submission Type</th>
                                                <th>Status</th>
                                                <th>Date Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @include('admin.footer')
        <script>
        $(function() {
            $('#submission-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: 'submission/data',
                    data: function(d) {
                        d.type = '{{ $submission_type }}';
                    },
                },
                columns: [
                    { data: 'negotiator_id', name: 'negotiator_id' },
                    { data: 'negotiator_name', name: 'negotiator_name' },
                    { data: 'form_code', name: 'form_code' },
                    { data: 'submission_type', name: 'submission_type' },
                    { data: 'status', name: 'status' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ]
            });
        });
    </script>
    </body>
</html>