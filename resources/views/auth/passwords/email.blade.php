<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="{{ secure_asset('assets/img/logo-fav.png') }}">
        <title>Proplenx</title>
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('assets/lib/material-design-icons/css/material-design-iconic-font.min.css') }}"/>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="{{ secure_asset('assets/css/style.css') }}" type="text/css"/>
    </head>
    <body class="be-splash-screen">
        <div class="be-wrapper be-login">
            <div class="be-content">
                <div class="main-content container-fluid">
                    <br /><br /><br />
                    <div class="splash-container">
                        <div class="panel panel-default panel-border-color panel-border-color-primary">
                            <div class="panel-heading"><img src="{{ secure_asset('assets/img/logo.png') }}"><span class="splash-description">Reset Password</span></div>
                            <div class="panel-body">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <input id="email" type="email" placeholder="Your Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                        
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    
                                    <div class="form-group login-submit">
                                        <button data-dismiss="modal" type="submit" class="btn btn-primary btn-xl">Send Password Reset Link</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="splash-footer"><span><a href="{{ url('/') }}">Back to login page</a></span></div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ secure_asset('assets/lib/jquery/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ secure_asset('assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ secure_asset('assets/js/main.js') }}" type="text/javascript"></script>
        <script src="{{ secure_asset('assets/lib/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                //initialize the javascript
                App.init();
            });
            
        </script>
    </body>
</html>