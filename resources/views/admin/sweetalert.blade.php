@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Sweet
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/sweetalert/css/sweetalert.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/custom_sweet_alert.css') }}"/>
    <!--end of page level css-->
    <style>
        .button-alignment{
            margin-top:5px;
        }
    </style>

@stop
    {{-- Page content --}}
@section('content')
        <!-- Main content -->
        <section class="content-header">
            <h1>Sweet Alert</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="material-icons breadmaterial">home</i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#">Ui Features</a>
                </li>
                <li class="active">Sweet Alert</li>
            </ol>
        </section>
        <section class="content">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">add_alert</i> Basic Sweet Alerts
                    </h3>
                    <span class="pull-right clickable">
                        <i class="material-icons">keyboard_arrow_up</i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-responsive button-alignment btn-primary" id="btn1">Simple Alert</button>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-responsive button-alignment btn-success" id="btn2">Some Large Text</button>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-responsive button-alignment btn-info" id="btn3">Success Alert</button>
                    </div>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">message</i> Advanced Sweet Alerts
                    </h3>
                    <span class="pull-right clickable">
                        <i class="material-icons">keyboard_arrow_up</i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-responsive button-alignment btn-warning" id="btn4">Submit action</button>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-responsive button-alignment btn-danger" id="btn5">Both Submit and Cancel</button>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-responsive button-alignment btn-primary" id="btn10">Input Prompt</button>
                    </div>
                </div>
            </div>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">portrait</i> Sweet Alerts with images
                    </h3>
                    <span class="pull-right clickable">
                        <i class="material-icons">keyboard_arrow_up</i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-responsive button-alignment btn-info" id="btn6">Simple Image</button>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-responsive button-alignment btn-success" id="btn7">Simple Image2</button>
                    </div>
                </div>
            </div>
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">timer</i> Sweet Alerts with closing time
                    </h3>
                    <span class="pull-right clickable">
                        <i class="material-icons">keyboard_arrow_up</i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-responsive button-alignment btn-warning" id="btn8">Auto Close</button>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-responsive button-alignment btn-primary" id="btn9">Ajax usage</button>
                    </div>
                </div>
            </div>
            <!--main content ends--> </section>
        <!-- content -->
        @stop
    {{-- page level scripts --}}
    @section('footer_scripts')
<!-- begining of page level js -->
<script type="text/javascript" src="{{asset('vendors/sweetalert/js/sweetalert.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('vendors/sweetalert/js/sweetalert-dev.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/pages/sweetalert.js') }}"></script>
        <script>

            $('#btn6').on('click',function(){
            swal({   title: "Sweet!",   text: "Here's a custom image.",   imageUrl: "{!! asset('images/c1.jpg')  !!}" });
            });

            $('#btn7').on('click',function(){
            swal({   title: "Sweet!",   text: "Here's a custom image.",   imageUrl: "{!! asset('images/c2.jpg')  !!}" });
            });
        </script>

@stop
