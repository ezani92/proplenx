<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.header')
            <div class="be-content">
                <div class="main-content container-fluid">
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <h3>All Negotiator List</h3>
                            <div class="panel panel-default panel-border-color panel-border-color-primary">
                                <div class="panel-body">
                                    <br />
                                    <table id="users-table" class="table table-striped table-hover table-fw-widget">
                                        <thead>
                                            <tr>
                                                <th>Negotiator ID</th>
                                                <th>Fullname</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Time Register</th>
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
                $('#users-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: 'user-data',
                    columns: [
                        { data: 'agent_code', name: 'agent_code' },
                        { data: 'name', name: 'name' },
                        { data: 'email', name: 'email' },
                        { data: 'phone', name: 'phone' },
                        { data: 'created_at', name: 'created_at' },
                        { data: 'actions', name: 'actions', orderable: false, searchable: false }
                    ]
                });
            });
        </script>
    </body>
</html>