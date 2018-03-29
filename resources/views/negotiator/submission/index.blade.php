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
                            <h3>All My Case Submission List's</h3>
                            <div class="panel panel-default panel-border-color panel-border-color-primary">
                                <div class="panel-body">
                                    <br />
                                    <table id="submission-table" class="table table-striped table-hover table-fw-widget">
                                        <thead>
                                            <tr>
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
        @include('negotiator.footer')
        <script>
        $(function() {
            $('#submission-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'submission/data',
                columns: [
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