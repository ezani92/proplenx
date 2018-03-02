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
                            <h3>Annoucement</h3>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-border-color panel-border-color-primary">
                                <div class="panel-heading">Create Annoucement</div>
                                <div class="panel-body">
                                    <form method="post" action="{{ url('admin/annoucement') }}">

                                        {{ csrf_field() }}
                                        <div class="form-group xs-pt-10">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control" required>
                                        </div>
                                        <div class="form-group xs-pt-10">
                                            <label>Body</label>
                                            <textarea name="body" class="form-control" required></textarea>
                                        </div>

                                        <div class="row xs-pt-15">
                                            <div class="col-xs-12">
                                                <p class="text-left">
                                                    <button type="submit" class="btn btn-space btn-primary">Create Annoucement</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="panel panel-border-color panel-border-color-primary">
                                <div class="panel-heading">Annoucement List</div>
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td width="25%"><strong>Title</strong></td>
                                                <td width="50%"><strong>Body</strong></td>
                                                <td width="25%"><strong>Date & Time</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(Auth::user()->unreadNotifications as $notification)
                                                @if(class_basename($notification->type) == 'Annoucement')
                                                    <tr>
                                                        <td>{{ $notification->data['title'] }}</td>
                                                        <td>{{ $notification->data['body'] }}</td>
                                                        <td>{{ $notification->created_at->diffForHumans() }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @include('admin.footer')
    </body>
</html>