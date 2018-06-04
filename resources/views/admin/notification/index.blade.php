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
                            <h3>Notification</h3>
                        </div>
                        <div class="col-md-12">
                            <ul class="list-group">
                                @foreach($user->notifications->sortBy('created_at') as $notification)
                                    @if($notification->unread())
                                        <li class="list-group-item">
                                            <strong>{{ $notification->data['title'] }}</strong> - 
                                            {{ $notification->data['body'] }}
                                            <div class="pull-right">
                                                <a href="{{ url('/admin/notification/'.$notification->id.'/mark-read') }}">
                                                    <span class="label label-info">mark as read</span>
                                                </a>
                                            </div>
                                        </li>
                                    @else
                                        <li class="list-group-item disabled">
                                            <strong>{{ $notification->data['title'] }}</strong> - 
                                            {{ $notification->data['body'] }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @include('admin.footer')
    </body>
</html>