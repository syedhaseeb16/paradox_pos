<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('images/user.png')}}" rel="icon" type="image/x-icon"/>
    <link href="{{asset('images/user.png')}}" rel="shortcut icon" type="image/x-icon"/>
    <title>@Yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{asset('backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('backend/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{asset('backend/build/css/custom.min.css')}}" rel="stylesheet">
    <style type="text/css">
        .error {
            color: red;
        }
    </style>
    @Yield('css')
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{route('user.dashboard')}}" class="site_title"><i class="fa fa-user"></i> <span> Paradox POS</span></a>
                </div>
                <div class="clearfix"></div>
                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{asset('images/user.png')}}" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>{{ Auth::user()->name}}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->
                <br/>
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            @php
                             $user = Auth::user();
                             $module = $user->roles[0]->modules->sortBy('module_rank')->where('view_sidebar','=',1);
                            @endphp
                            @foreach($module as $m)
                            <li><a href="{{url($m->module_url)}}"><i class="{{$m->module_icon}}"></i>{{$m->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="{{asset('images/user.png')}}" alt="">{{ Auth::user()->name}}
                                <span class="fa fa-power-off"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="{{route('change.password')}}"> Change Password</a></li>
                                <li><a href="{{route('user.logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>

                       <!-- <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="badge bg-green">2 </span> 
                            </a>
    
                        </li>-->
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->
        <!--#####################################################
        ####################################################### -->
        <!-- page content -->
       @yield('content')
        <!-- / page content -->
        <!--#####################################################
         ####################################################### -->
        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Copy Right All Reserve <a href="http://www.cheetahwebtech.com">CheetahWebtech</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>
<!-- jQuery -->
<script src="{{asset('backend/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('backend/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/build/js/custom.min.js')}}"></script>
@Yield('script')
</body>
</html>
