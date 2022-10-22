<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('gentelella-master/images/favicon.ico') }}" type="image/ico" />

    <title>Dashboard !</title>

    <!-- Bootstrap -->
    <link href="{{ asset('gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('gentelella-master/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('gentelella-master/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('gentelella-master/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link
        href="{{ asset('gentelella-master/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}"
        rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('gentelella-master/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css') }}"
        rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('gentelella-master/build/css/custom.min.css') }}" rel="stylesheet">
    @yield('css')
    @yield('datatables')
</head>
{{-- @if (!in_array(request()->path(), ['login', 'register', 'password/reset', 'password/email']))
@else
@endif --}}
  
@auth
@if (auth()->user()->isAdmin())
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">

                        {{-- Main navbar For Admin --}}
                        {{-- @if (auth()->user()->isAdmin()) --}}
                        <div class="navbar nav_title" style="border: 0;">
                            <a class="site_title"><i class="fa fa-paw"></i> <span>ADMIN LOGIN!</span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <div class="profile_pic">
                                @php
                                    $admin = $admins->where('user_id', auth()->user()->id)->first();
                                @endphp
                                @if (isset($admin))
                                    <img class="img-circle profile_img" src="{{ $admin->image }}" alt="">
                                @endif
                            </div>
                            <div class="profile_info">
                                <span>Welcome</span>
                                <h2></h2>
                            </div>
                        </div>
                        <!-- /menu profile quick info -->

                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <h3>Welcome in Dashboard!</h3>
                                <ul class="nav side-menu">
                                    <li>
                                        <a href="{{ url('/') }}"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a><i class="fa fa-bars"></i> Employees<span
                                                class="fa fa-chevron-circle-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li>
                                                <a href="{{ route('admins') }}">Supervisors</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('coachs') }}">Trainers</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('cleaners') }}">Workers</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-user"></i> Users<span class="fa fa-chevron-circle-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{ route('users') }}">Users</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a><i class="fa fa-female"></i> Subscribers<span
                                                class="fa fa-chevron-circle-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li>
                                                <a href="{{ route('trainees') }}">Subscribers</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a><i class="fa fa-group"></i> Groups<span
                                                class="fa fa-chevron-circle-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li>
                                                <a href="{{ route('courses') }}"> Groups </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="menu_section">
                                <ul class="nav side-menu">
                                    <li>
                                        <a><i class="fa fa-file-text"></i> Reports<span
                                                class="fa fa-chevron-circle-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li>
                                                <a href="{{ route('reports.employees') }}"> Employee Report </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('reports.trainees') }}"> Subscriber Report </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('reports.statistics') }}"> Statistical Report </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a><i class="fa fa-pencil-square"></i> Posts<span
                                                class="fa fa-chevron-circle-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li>
                                                <a href="{{ route('adverts') }}"> Posts</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a><i class="fa fa-legal"></i> Machine<span
                                                class="fa fa-chevron-circle-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li>
                                                <a href="{{ route('devices') }}"> Machines </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a><i class="fa fa-plus-square"></i> Medical Registers<span
                                                class="fa fa-chevron-circle-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li>
                                                <a href="{{ route('medicals') }}">Registers</a>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        {{-- @endif --}}
                        <!-- /sidebar menu -->


                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        @guest
                        @else

                            <nav class="nav navbar-nav">
                                <ul class=" navbar-right">
                                    <li class="nav-item dropdown open" style="padding-left: 15px;">
                                        <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                            id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                            @php
                                                $admin = $admins->where('user_id', auth()->user()->id)->first();
                                            @endphp
                                            @if (isset($admin))
                                                <img style="border-radios:50%" src="{{ $admin->image }}" alt="">
                                            @endif
                                            {{ Auth::user()->name }}
                                        </a>
                                        <div class="dropdown-menu dropdown-usermenu pull-right"
                                            aria-labelledby="navbarDropdown">
                                            <a href="{{ route('user.admin_profile') }}" class="dropdown-item">
                                                Profile</a>
                                            <a href="{{ route('setting') }}" class="dropdown-item">
                                                <span>Settings</span>
                                            </a>
                                            <div>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                    document.getElementById('logout-form').submit();"><i
                                                        class="fa fa-sign-out pull-right"></i>
                                                    Log
                                                    Out</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        @endguest
                    </div>
                </div>
            </div>
            <!-- /top navigation -->
  
            @endif
            {{-- Main Content --}}
            @yield('content')
        @else
            {{-- not auth --}}
            @yield('content')
        @endauth

    </div>

    <!-- jQuery -->
    <script src="{{ asset('gentelella-master/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('gentelella-master/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('gentelella-master/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('gentelella-master/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('gentelella-master/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('gentelella-master/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('gentelella-master/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <!-- iCheck -->
    <script src="{{ asset('gentelella-master/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('gentelella-master/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('gentelella-master/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('gentelella-master/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('gentelella-master/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('gentelella-master/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('gentelella-master/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('gentelella-master/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('gentelella-master/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('gentelella-master/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('gentelella-master/vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('gentelella-master/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('gentelella-master/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('gentelella-master/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('gentelella-master/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('gentelella-master/build/js/custom.min.js') }}"></script>
    @yield('js')
</body>

</html>
