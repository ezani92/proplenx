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
                            <h3>Report</h3>
                            <br /
                            <form method="get">
                                <div class="form-group">
                                    <label>Select Year</label>
                                    <select class="form-control" id="selectYear" onchange="selectYear(this.value);">
                                        <option value="{{ \Carbon\Carbon::now()->format('Y') }}">{{ \Carbon\Carbon::now()->format('Y') }}</option>
                                        <option value="{{ \Carbon\Carbon::now()->subYears(1)->format('Y') }}">{{ \Carbon\Carbon::now()->subYears(1)->format('Y') }}</option>
                                        <option value="{{ \Carbon\Carbon::now()->subYears(2)->format('Y') }}">{{ \Carbon\Carbon::now()->subYears(2)->format('Y') }}</option>
                                        <option value="{{ \Carbon\Carbon::now()->subYears(3)->format('Y') }}">{{ \Carbon\Carbon::now()->subYears(3)->format('Y') }}</option>
                                        <option value="{{ \Carbon\Carbon::now()->subYears(4)->format('Y') }}">{{ \Carbon\Carbon::now()->subYears(4)->format('Y') }}</option>
                                    </select>
                                </div>
                            </form>
                            {!! $chart->html() !!}
                        </div>
                        
                    </div>
                </div>
            </div>
        @include('admin.footer')
        <script type="text/javascript">
            function selectYear(d)
            {
                window.location.href = "{{ url('/') }}/admin/report?year="+d;
            }
            @if(isset($_GET['year']))
                $('#selectYear').val('{{ $_GET['year'] }}');
            @endif
        </script>
        {!! $chart->script() !!}
        
        {!! Charts::scripts() !!}

    </body>
</html>