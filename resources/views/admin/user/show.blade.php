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
                    <div class="col-md-6">
                        <div class="panel panel-border-color panel-border-color-primary">
                            <div class="panel-heading">Personal Details</div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <td width="30%"><strong>Fullname</strong></td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email</strong></td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Phone Number</strong></td>
                                        <td>{{ $user->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Gender</strong></td>
                                        <td>{{ $user->gender }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Full Address</strong></td>
                                        <td>{{ $user->full_address }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Created At</strong></td>
                                        <td>{{ $user->created_at->format('d M Y, h:i A') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Last Login</strong></td>
                                        <td>{{ $user->last_login->format('d M Y, h:i A') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-border-color panel-border-color-primary">
                            <div class="panel-heading">Other Details</div>
                            <div class="panel-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <td><strong>Negotiator ID</strong></td>
                                        <td>{{ $user->agent_code }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Commision </strong></td>
                                        <td>{{ $user->commision_rate }}%</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Bank Account Details</strong></td>
                                        <td>{{ $user->bank_account_no }} ({{$user->bank_name}})</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <a href="{{ url('admin/user/'.$user->id.'/edit') }}" class="btn btn-block btn-info">Edit Account</a>
                        <a href="{{ url('admin/user/'.$user->id.'/resetpassword') }}" onclick="return resetpassword(this.href)" class="btn btn-block btn-default">Reset password</a>
                        @if($user->is_active == 1)
                        <a href="{{ url('admin/user/'.$user->id.'/deactivated') }}" onclick="return deactivated(this.href)" class="btn btn-block btn-warning">Deactivate Account</a>
                        @elseif($user->is_active == 0)
                        <a href="{{ url('admin/user/'.$user->id.'/activated') }}" onclick="return activated(this.href)" class="btn btn-block btn-success">Activate Account</a>
                        @endif
                        <a href="{{ url('admin/user/'.$user->id.'/delete') }}" onclick="return deleteUser(this.href)" class="btn btn-block btn-danger">Permenently Delete Account</a>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.footer')
        <script type="text/javascript">
            function deactivated(url) {
            
                swal({
                    title: 'Are you sure?',
                    text: "This Negotiator Will Be Block From Login",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#FBB711',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, deactivated it!'
                }).then(function() {
                    window.location.replace(url);
                })
            
                return false;
            }
            
            function activated(url) {
            
                swal({
                    title: 'Are you sure?',
                    text: "This Negotiator Will Be Able To Login",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, activated it!'
                }).then(function() {
                    window.location.replace(url);
                })
            
                return false;
            }

            function resetpassword(url) {
            
                swal({
                    title: 'Are you sure?',
                    text: "Negotiator will receive an email with new password",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, reset it!'
                }).then(function() {
                    window.location.replace(url);
                })
            
                return false;
            }

            function deleteUser(url) {
            
                swal({
                    title: 'Are you sure?',
                    text: "All submission & documents related to this negotiator also will be deleted!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete this negotiator!'
                }).then(function() {
                    window.location.replace(url);
                })
            
                return false;
            }
        </script>
    </body>
</html>