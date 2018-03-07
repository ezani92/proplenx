
    
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
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.2/sweetalert2.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="{{ secure_asset('assets/css/style.css') }}" type="text/css"/>
    </head>
    <body>
        <div class="be-wrapper be-fixed-sidebar">
            <nav class="navbar navbar-default navbar-fixed-top be-top-header">
                <div class="container-fluid">
                    <div class="navbar-header"><a href="{{ url('/admin') }}" class="navbar-brand"></a>
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
                                    <li><a href="{{ url('admin/account') }}"><span class="icon mdi mdi-face"></span> Account</a></li>
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
            <div class="be-left-sidebar">
                <div class="left-sidebar-wrapper">
                    <a href="#" class="left-sidebar-toggle">Dashboard</a>
                    <div class="left-sidebar-spacer">
                        <div class="left-sidebar-scroll">
                            <div class="left-sidebar-content">
                                <ul class="sidebar-elements">
                                    <li class="divider">Menu</li>
                                    <li class="{{ Request::is('admin') ? 'active' : '' }}">
                                        <a href="{{ url('/') }}"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a>
                                    </li>
                                    <li class="parent {{ Request::is('admin/submission*') ? 'active' : '' }}">
                                        <a href="#"><i class="icon mdi mdi-collection-text"></i><span>Submission</span></a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ url('admin/submission') }}">All Submission</a></li>
                                        </ul>
                                    </li>
                                    <li class="{{ Request::is('admin/report*') ? 'active' : '' }}">
                                        <a href="{{ url('admin/report') }}"><i class="icon mdi mdi-chart"></i><span>Report</span></a>
                                    </li>
                                    <li class="divider">Admin Action</li>
                                    <li class="parent {{ Request::is('admin/user*') ? 'active' : '' }}">
                                        <a href="#"><i class="icon mdi mdi-face"></i><span>User Management</span></a>
                                        <ul class="sub-menu">
                                            <li class="{{ Request::is('admin/user') ? 'active' : '' }}"><a href="{{ url('admin/user') }}">All User List</a></li>
                                            <li class="{{ Request::is('admin/user/create') ? 'active' : '' }}"><a href="{{ url('admin/user/create') }}">Create New User</a></li>
                                        </ul>
                                    </li>
                                    <li class="{{ Request::is('admin/annoucement') ? 'active' : '' }}">
                                        <a href="{{ url('admin/annoucement') }}"><i class="icon mdi mdi-notifications"></i><span>Announcement</span></a>
                                    </li>
                                    <li class="{{ Request::is('admin/settings*') ? 'active' : '' }}">
                                        <a href="{{ url('admin/settings') }}"><i class="icon mdi mdi-wrench"></i><span>Site Settings</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>