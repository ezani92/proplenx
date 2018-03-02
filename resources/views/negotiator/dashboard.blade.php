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
                            @if(Auth::user()->default_password == 1)
                                <div role="alert" class="alert alert-warning alert-simple alert-dismissible">
                                    <button type="button" data-dismiss="alert" aria-label="Close" class="close">
                                        <span aria-hidden="true" class="mdi mdi-close"></span>
                                    </button><span class="icon mdi mdi-alert-triangle"></span>
                                    <strong>Important!</strong>
                                    You are still using default password on your account. It advisable for you to change for better security, Click <a href="#">HERE</a> to continue change your password.
                                </div>
                            @endif

                            @foreach(Auth::user()->unreadNotifications->take(1) as $notification)
                                @if(class_basename($notification->type) == 'Annoucement')
                                    <div role="alert" class="alert alert-primary alert-simple alert-dismissible">
                                        <button type="button" data-dismiss="alert" aria-label="Close" class="close close-annoucement" data-id="{{ $notification->id }}">
                                            <span aria-hidden="true" class="mdi mdi-close"></span>
                                        </button><span class="icon mdi mdi-info-outline"></span>
                                    <strong>{{ $notification->data['title'] }}</strong>
                                    {{ $notification->data['body'] }}
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @include('negotiator.footer')
        <script type="text/javascript">
            $(".close-annoucement").click(function(){

                var notification_id = $(this).data("id");

                $.post("api/notification/read/" + notification_id, function(data, status){
                    
                });
            });
        </script>
    </body>
</html>