
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="{{ secure_asset('favicon.ico') }}">
        <title>Proplenx</title>
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('assets/lib/material-design-icons/css/material-design-iconic-font.min.css') }}"/>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('assets/lib/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('assets/lib/jqvmap/jqvmap.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.2/sweetalert2.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css">
        <link rel="stylesheet" href="{{ secure_asset('assets/css/style.css') }}" type="text/css"/>
    </head>
    <body>
        <div class="be-wrapper be-fixed-sidebar">
            <nav class="navbar navbar-default navbar-fixed-top be-top-header">
                <div class="container-fluid">
                    <div class="navbar-header"><a href="{{ url('/negotiator') }}" class="navbar-brand"></a>
                    </div>
                    <div class="be-right-navbar">
                        <ul class="nav navbar-nav navbar-right be-user-nav">
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="{{ secure_asset('assets/img/avatar.png') }}" alt="Avatar"><span class="user-name">{{ Auth::user()->name }}</span></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li>
                                        <div class="user-info">
                                            <div class="user-name">{{ Auth::user()->name }}</div>
                                            <div class="user-position online">Online</div>
                                        </div>
                                    </li>
                                    <li><a href="{{ url('negotiator/account') }}"><span class="icon mdi mdi-face"></span> Account</a></li>
                                    <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span class="icon mdi mdi-power"></span> Logout</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        </ul>
                        <div class="page-title"><span></span></div>
                        <ul class="nav navbar-nav navbar-right be-icons-nav">
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-notifications"></span><span class="indicator"></span></a>
                                <ul class="dropdown-menu be-notifications">
                                    <li>
                                        <div class="title">New Notifications<span class="badge">{{ Auth::user()->unreadNotifications->count() }}</span></div>
                                        <div class="list">
                                            <div class="be-scroller">
                                                <div class="content">
                                                    <ul>
                                                        @foreach(Auth::user()->unreadNotifications as $notification)
                                                            <li class="notification notification-unread">
                                                                <a href="#">
                                                                    <div class="image"><img src="{{ secure_asset('assets/img/annoucement.png') }}" alt="Avatar"></div>
                                                                    <div class="notification-info">
                                                                        <div class="text"><span class="user-name">Annoucement!</span> {{ $notification->data['title'] }} - {{ $notification->data['body'] }}</div>
                                                                        <span class="date">{{ $notification->created_at->diffForHumans() }}</span>
                                                                    </div>
                                                                </a>
                                                            </li>

                                                        @endforeach
                                                        @foreach(Auth::user()->readNotifications as $notification)
                                                            <li class="notification s"> 
                                                                <a href="#">
                                                                    <div class="image"><img src="{{ secure_asset('assets/img/annoucement.png') }}" alt="Avatar"></div>
                                                                    <div class="notification-info">
                                                                        <div class="text"><span class="user-name">Annoucement!</span> {{ $notification->data['title'] }} - {{ $notification->data['body'] }}</div>
                                                                        <span class="date">{{ $notification->created_at->diffForHumans() }}</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer"> <a href="#">View all notifications</a></div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="be-left-sidebar hidden-print">
                <div class="left-sidebar-wrapper">
                    <a href="#" class="left-sidebar-toggle">Dashboard</a>
                    <div class="left-sidebar-spacer">
                        <div class="left-sidebar-scroll">
                            <div class="left-sidebar-content">
                                <ul class="sidebar-elements">
                                    <li class="divider">Menu</li>
                                    <li class="{{ Request::is('negotiator') ? 'active' : '' }}">
                                        <a href="{{ url('/') }}"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a>
                                    </li>
                                    <li class="parent {{ Request::is('negotiator/submission*') ? 'active' : '' }}">
                                        <a href="#"><i class="icon mdi mdi-collection-text"></i><span>Submission</span></a>
                                        <ul class="sub-menu">
                                            <li class="{{ Request::is('negotiator/submission') ? 'active' : '' }}"><a href="{{ url('negotiator/submission') }}">My Submission</a></li>
                                            <li class="{{ Request::is('negotiator/submission/create') ? 'active' : '' }}"><a href="{{ url('negotiator/submission/create') }}">Create Submission</a></li>
                                        </ul>
                                    </li>
                                    <li class="{{ Request::is('negotiator/report*') ? 'active' : '' }}">
                                        <a href="{{ url('negotiator/report') }}"><i class="icon mdi mdi-chart"></i><span>Report</span></a>
                                    </li>
                                    <li class="parent {{ Request::is('negotiator/eform*') ? 'active' : '' }}">
                                        <a href="#"><i class="icon mdi mdi-cloud-outline-alt"></i><span>e-Form</span></a>
                                        <ul class="sub-menu">
                                            <li class="{{ Request::is('negotiator/eform/authorization-to-sell') ? 'active' : '' }}">
                                                <a href="{{ url('negotiator/eform/authorization-to-sell') }}">Authorization To Sell</a>
                                            </li>
                                            <li class="{{ Request::is('negotiator/eform/offer-to-purchase') ? 'active' : '' }}">
                                                <a href="{{ url('negotiator/eform/offer-to-purchase') }}">Offer To Purchase</a>
                                            </li>
                                            <li class="{{ Request::is('negotiator/eform/offer-to-rent') ? 'active' : '' }}">
                                                <a href="{{ url('negotiator/eform/offer-to-rent') }}">Offer To Rent</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>