<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIK FORUM</title>

    <link type="text/css" href="{{ asset('backend_assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('backend_assets/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('backend_assets/css/theme.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('backend_assets/images/icons/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert.min.css') }}" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>


</head>
<body>
    <div id="app">

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="{{ url('/') }}"><img src="{{ asset('backend_assets/images/logo-2.png') }}"> </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        
                        <ul class="nav pull-right">
                            @guest
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            
                            <img src="{{ asset('backend_assets/images/troll.jpg') }}" class="nav-avatar" /> {{ Auth::user()->name }}
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                     <span class="caret"></span>

                                </a>
                                    <li><a href="{{ url('question') }}">Question?</a></li>
                                    <li><a href="{{ url('question/mypost') }}">My Post</a></li>
                                    <li class="divider"></li>
                                    <li>

                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="icon-off"></i>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                    </li>
                            @endguest
                                
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->

        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">

                                <li class="active"><a href="{{ url('/') }}"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                <!--<li><a href="{{ url('forum') }}"><i class="menu-icon icon-bullhorn"></i>Forum</a>-->
                                <li><a href="{{ url('question') }}"><i class="menu-icon icon-plus"></i>Question?</a>
                                </li>
                            </ul>
                            <!--/.widget-nav-->

                            <ul class="widget widget-menu unstyled">
                                <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>More</a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <li><a href="{{ url('question/viewUser') }}"><i class="icon-inbox"></i> All Users </a></li>
                                        
                                    </ul>
                                </li>
                                <li><a href="{{ url('about') }}"><i class="icon-question-sign"></i> &nbsp;About</a></li>
                                
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="module">
                                @yield('content')
                            </div>
                        </div>
                        <!--/.module-->
                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->
    <div class="footer">
        <div class="container">
            <b class="copyright">Made with <font color="pink">&#10084;</font> by Kelompok 9 </b>All rights reserved.
        </div>
    </div>

    <!-- Scripts -->


    <script src="{{ asset('backend_assets/scripts/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend_assets/scripts/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend_assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend_assets/scripts/flot/jquery.flot.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend_assets/scripts/flot/jquery.flot.resize.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend_assets/scripts/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('backend_assets/scripts/common.js') }}" type="text/javascript"></script>
    <script src=" http://localhost/forumfinal/public/js/sweetalert.min.js"></script>





    <script type="text/javascript">
        @if(notify()->ready() )
        swal({
            title:"{!! notify()->message() !!}",
            type: "{{notify()->type()  }}",
            @if(notify()->option('timer'))
                timer:"{{notify()->option('timer') }}",
                showConfirmButton: false, 
            @endif
            
        });
        @endif        

    </script>


</body>
</html>
