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
                        <div class="col-md-4 well text-center">
                            <h3>Agent : {{ $agent }}</h3>
                        </div>
                        <div class="col-md-4 well text-center">
                            <h3>Active Agent : {{ $active_agent }}</h3>
                        </div>
                        <div class="col-md-4 well text-center">
                            <h3>Not Active Agent : {{ $not_active_agent }}</h3>
                        </div>
                        <div class="col-md-4 well text-center">
                            <h3>Submission : {{ $submission }}</h3>
                        </div>
                        <div class="col-md-4 well text-center">
                            <h3>PAID Submission : {{ $paid_submission }}</h3>
                        </div>
                        <div class="col-md-4 well text-center">
                            <h3>Pending Submission : {{ $pending_submission }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        @include('admin.footer')
    </body>
</html>