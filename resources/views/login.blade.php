<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User Registration</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../css/material-bootstrap-wizard.css">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="fonts/fontswizard.css" />
    <link rel="stylesheet" href="fonts/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/sweetalert/css/sweetalert.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/custom_sweet_alert.css') }}"/>
    <style>
        a {
            color:#d2d2d2;
        }
        a:hover {
            color:#d2d2d2;
        }
    </style>
</head>

<body>

<div class="animation flipInX image-container set-full-height" id="maindiv" style="background-image: url('img/Photo-2.png')">
@php $lang='labeleng';@endphp

<!--   Big container   -->
    <div class="container">
        <div class="row">

            <div class="col-sm-6 col-sm-offset-3">
                <!--      Wizard container        -->
                <div class="box animation flipInX">
                    <div class="box1">
                        <img src="{{ asset('images/bot-final-logo-HR.png') }}" width="100px" alt="logo" class="logo_position">
                        <h3 style="color:#d2d2d2">Log In</h3>
                        <!-- Notifications -->
                        @include('notifications')

                        <form action="{{ route('login') }}" class="omb_loginForm"  autocomplete="off" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group label-floating {{ $errors->first('email', 'has-error') }}">
                                    <label class="control-label" for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           value="{!! old('email') !!}">
                                </div>
                                <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                                <div class="form-group label-floating {{ $errors->first('password', 'has-error') }}">
                                    <label class="control-label" for="Password">Password</label>
                                    <input type="password" class="form-control" name="password" id="Password">
                                </div>
                                <span class="help-block">{{ $errors->first('password', ':message') }}</span>
                                <!--<div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember Password
                                    </label>
                                </div>-->
                                <input type="submit" class="btn btn-block" value="Log In">
                                <span style="color:#d2d2d2">Don't have an account?</span> <a href="{{ route('register') }}"><strong> Sign Up</strong></a>

                        </form>
                    </div>
                    <!--<div class="bg-light animation flipInX">
                        <a href="{{ route('forgot-password') }}" id="forgot_pwd_title">Forgot Password?</a>
                    </div>-->
                </div>
            </div>
        </div><!-- end row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container text-center">
            <!-- Made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>. Free download <a href="http://www.creative-tim.com/product/bootstrap-wizard">here.</a>-->
        </div>
    </div>
</div>


<div class="container">
    <!--Content Section Start -->
    <div class="row">

    </div>
    <!-- //Content Section End -->
</div>
<!--global js starts-->
<script type="text/javascript" src="{{ asset('js/frontend/lib.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/frontend/login_custom.js') }}"></script>
<!--global js end-->
</body>
</html>
