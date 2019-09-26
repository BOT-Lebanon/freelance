<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
            | B.O.T Admin
        @show
    </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="icon" href="{{ asset('img/logo_small.png') }}" type="image/x-icon">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
    <!-- font Awesome -->


    <!-- end of global css -->
    <!--page level css-->
    @yield('header_styles')
            <!--end of page level css-->

<body class="skin-josh">
<header class="header">
    <a href="{{ route('admin.dashboard') }}" class="logo">
        <img src="../images/bot-final-logo-HR.png" width="100px" alt="logo" class="logo_position">
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <div>
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <div class="responsive_nav"></div>
            </a>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                @include('admin.layouts._messages')
                @include('admin.layouts._notifications')
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{--@if(Sentinel::getUser()->pic)--}}
                            {{--<img src="{!! url('/').'/uploads/users/'.Sentinel::getUser()->pic !!}" alt="img" height="35px" width="35px"--}}
                                 {{--class="img-circle img-responsive pull-left"/>--}}
                        {{--@else--}}
                            {{--<img src="{!! asset('img/authors/avatar3.jpg') !!} " width="35"--}}
                                 {{--class="img-circle img-responsive pull-left" height="35" alt="riot">--}}
                        {{--@endif--}}



                            @if(Sentinel::getUser()->pic)
                                <img src="{!! url('/').'/uploads/users/'.Sentinel::getUser()->pic !!}" alt="img"
                                     class="img-circle  img-responsive pull-left" width="35" height="35"/>
                            @elseif(Sentinel::getUser()->gender === "male")
                                <img src="{{ asset('images/authors/avatar3.png') }}" alt="..."
                                     class="img-circle img-responsive pull-left" width="35" height="35"/>
                            @elseif(Sentinel::getUser()->gender === "female")
                                <img src="{{ asset('images/authors/avatar5.png') }}" alt="..."
                                     class="img-circle img-responsive pull-left" width="35" height="35"/>
                            @else
                                <img src="{{ asset('images/authors/no_avatar.jpg') }}" alt="..."
                                     class="img-circle img-responsive pull-left" width="35" height="35"/>

                            @endif
                        <div class="riot">
                            <div>
                                <p class="user_name_max" id="user_nav">{{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}</p>
                                <span>
                                        <i class="caret"></i>
                                    </span>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">

                                @if(Sentinel::getUser()->pic)
                                    <img src="{!! url('/').'/uploads/users/'.Sentinel::getUser()->pic !!}" alt="img"
                                         class="img-circle  "/>
                                @elseif(Sentinel::getUser()->gender === "male")
                                    <img src="{{ asset('images/authors/avatar3.png') }}" alt="..."
                                         class="img-circle "/>
                                @elseif(Sentinel::getUser()->gender === "female")
                                    <img src="{{ asset('images/authors/avatar5.png') }}" alt="..."
                                         class="img-circle "/>
                                @else
                                    <img src="{{ asset('images/authors/no_avatar.jpg') }}" alt="..."
                                         class="img-circle "/>

                                @endif
                            <p class="topprofiletext">{{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}</p>
                        </li>
                        <!-- Menu Body -->
                        <li>
                            <a href="{{ URL::route('admin.users.show',Sentinel::getUser()->id) }}">
                                <i class="material-icons">person</i>
                                My Profile
                            </a>
                        </li>
                        <li role="presentation"></li>
                        <li>
                            <a href="{{ route('admin.users.edit', Sentinel::getUser()->id) }}">
                                <i class="material-icons">settings</i>
                                Account Settings
                            </a>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ URL::route('lockscreen',Sentinel::getUser()->id) }}">
                                    <i class="material-icons">lock</i>
                                    Lock
                                </a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ URL::to('admin/logout') }}">
                                    <i class="material-icons">exit_to_app</i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="wrapper">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side">
        <section class="sidebar ">
            <div class="page-sidebar  sidebar-nav">
                <div class="nav_icons">
                    <ul class="sidebar_threeicons">
                        <li>
                            <a href="{{ URL::to('admin/advanced_tables') }}">
                                <i class="material-icons text-info fsize" title="Advanced tables">view_module</i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/tasks') }}">
                                <i class="material-icons text-danger fsize" title="Tasks">view_list</i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/gallery') }}">
                                <i class="material-icons text-warning fsize" title="Gallery">photo_library</i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/users') }}">
                                <i class="material-icons text-success fsize" title="Users List">group</i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <!-- BEGIN SIDEBAR MENU -->
                @include('admin.layouts._left_menu')
                <!-- END SIDEBAR MENU -->
            </div>
        </section>
    </aside>
    <aside class="right-side">

        {{--<!-- Notifications -->--}}
        <div id="notification_remove">
            @include('notifications')
        </div>

                <!-- Content -->
        @yield('content')

    </aside>
    <!-- right-side -->
</div>
<a id="back-to-top" href="#" class="btn btn-primary  back-to-top" role="button" title="Return to top"
   data-toggle="tooltip" data-placement="left">
    <i class="material-icons btn_tak fsize">flight_takeoff</i>
</a>
<!-- global js -->
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<!-- end of global js -->
<!-- begin page level js -->
@yield('footer_scripts')
        <!-- end page level js -->
</body>
</html>
