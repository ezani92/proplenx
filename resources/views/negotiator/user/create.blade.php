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
                            <h3>Create Negotiator</h3>
                            <div class="panel panel-border-color panel-border-color-primary">
                                <div class="panel-body">
                                    <form method="post" action="{{ url('admin/user') }}">

                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <br />
                                                <b><p style="text-decoration: underline;">Personal Details</p></b>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group xs-pt-10">
                                                    <label>Fullname</label>
                                                    <input type="text" name="fullname" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group xs-pt-10">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group xs-pt-10">
                                                    <label>NRIC</label>
                                                    <input type="text" name="nric" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group xs-pt-10">
                                                    <label>Phone Number</label>
                                                    <input type="text" name="phone_no" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group xs-pt-10">
                                                    <label>Gender</label>
                                                    <select class="form-control" name="gender">
                                                        <option>Select</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group xs-pt-10">
                                                    <label>Full Address</label>
                                                    <textarea class="form-control" name="address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-md-12">
                                                <b><p style="text-decoration: underline;">Other Details</p></b>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group xs-pt-10">
                                                    <label>Commission Rate (60% - 90%)</label>
                                                    <input type="number" min="60" max="90" step="0.01" name="commission_rate" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group xs-pt-10">
                                                    <label>Bank Account Number</label>
                                                    <input type="text" name="bank_acc_no" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group xs-pt-10">
                                                    <label>Bank Name</label>
                                                    <input type="text" name="bank_name" class="form-control" required>
                                                </div>
                                            </div>
                                         </div>   

                                        <div class="row xs-pt-15">
                                            <div class="col-xs-12">
                                                <p class="text-left">
                                                    <button type="submit" class="btn btn-space btn-primary">Create Account</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @include('admin.footer')
    </body>
</html>