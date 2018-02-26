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
                            <div class="panel panel-border-color panel-border-color-primary">
                                <div class="panel-heading">Account</div>
                                <div class="panel-body">
                                    <form method="post" action="{{ url('admin/account') }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <div class="form-group xs-pt-10">
                                            <label>Fullname</label>
                                            <input type="text" name="fullname" value="{{ $user->name }}" placeholder="Enter email" class="form-control">
                                        </div>
                                        <div class="form-group xs-pt-10">
                                            <label>Email</label>
                                            <input type="email" name="email" value="{{ $user->email }}" placeholder="Enter email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Password <sup style="color: red;">* Leave empty if remain old password</sup></label>
                                            <input type="password" name="password" placeholder="Password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password<sup style="color: red;">* Leave empty if remain old password</sup></label>
                                            <input type="password" name="confirm_password" placeholder="Password" class="form-control">
                                        </div>
                                        <div class="row xs-pt-15">
                                            <div class="col-xs-12">
                                                <p class="text-left">
                                                    <button type="submit" class="btn btn-space btn-primary">Update Account</button>
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