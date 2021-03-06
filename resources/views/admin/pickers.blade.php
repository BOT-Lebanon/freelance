@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Pickers
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('vendors/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('vendors/jquery-spinner/css/bootstrap-spinner.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/pages/pickers.css') }}" rel="stylesheet" />

@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <!--section starts-->
                <h1>
                    Pickers
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="material-icons breadmaterial">home</i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">UI Components</a>
                    </li>
                    <li class="active">Pickers</li>
                </ol>
            </section>
            <!--section ends-->
<section class="content">
    <!--main content-->
    <div class="row">
        <div class="col-md-6">
            <!--time picker-->
            <!--time picker ends-->
            <!--time picker-->
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">cloud</i> Bootstrap TouchSpin
                    </h3>
                                <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                </div>
                <div class="panel-body">
                    <div class="box-body">
                        <!-- Touch spin -->
                        <div class="form-group">
                            <label>Postfix</label>
                            <input id="demo1" type="text" value="55" name="demo1" class="form-control">
                        </div>
                        <!-- /.form group -->
                        <!-- Touch spin -->
                        <div class="form-group">
                            <label>Prefix</label>
                            <div class="label_floatin">
                                <input id="demo2" type="text" value="0" name="demo2" class="form-control">
                            </div>
                        </div>
                        <!-- /.form group -->
                        <!-- Touch spin -->
                        <div class="form-group">
                            <label>Vertical button alignment</label>
                            <div class="label_floatin">
                                <input id="demo_vertical" type="text" value="" name="demo_vertical" class="form-control">
                            </div>
                        </div>
                        <!-- /.form group -->
                        <!-- Touch spin -->
                        <div class="form-group">
                            <label>Vertical buttons with custom icons</label>
                            <div class="label_floatin">
                                <input id="demo_vertical2" type="text" value="" name="demo_vertical2" class="form-control">
                            </div>
                        </div>
                        <!-- /.form group -->
                        <!-- Touch spin -->
                        <div class="form-group">
                            <label>Init with empty value</label>
                            <div class="label_floatin">
                                <input id="demo3" type="text" value="" name="demo3" class="form-control">
                            </div>
                        </div>
                        <!-- /.form group -->
                        <!-- Touch spin -->
                        <div class="form-group">
                            <label>Value attribute is not set (applying settings.initval)</label>
                            <div class="label_floatin">
                                <input id="demo3_21" type="text" value="" name="demo3_21" class="form-control">
                            </div>
                        </div>
                        <!-- /.form group -->
                        <!-- Touch spin -->
                        <div class="form-group">
                            <label>Button postfix (small)</label>
                            <div class="label_floatin">
                                <input id="demo4" type="text" value="" name="demo4" class="form-control input-sm">
                            </div>
                        </div>
                        <!-- /.form group -->
                        <!-- Touch spin -->
                        <div class="form-group">
                            <label>Button postfix (large)</label>
                            <div class="input-group input-group-lg">
                                <input id="demo4_2" type="text" value="" name="demo4_2" class="form-control input-lg">
                            </div>
                        </div>
                        <!-- /.form group -->
                        <!-- Touch spin -->
                        <div class="form-group last_btn">
                            <label>Button group</label>
                            <div class="label_floatin">
                                <div class="input-group">
                                    <input id="demo5" type="text" class="form-control" name="demo5" value="50">
                                </div>
                            </div>
                        </div>
                        <!-- /.form group -->
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!--Spinners-->
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">build</i> General Pickers
                    </h3>
                                <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                </div>
                <div class="panel-body general_pickers">
                    <!--switch -->
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="spinners">
                            <label>Quality</label>
                            <div class="input-group spinner" data-trigger="spinner">
                                <input type="text" class="form-control" value="1" data-rule="quantity">
                                <div class="input-group-addon">
                                    <a href="javascript:;" class="spin-up" data-spin="up">
                                        <i class="material-icons">keyboard_arrow_up</i></a>
                                    <a href="javascript:;" class="spin-down" data-spin="down">
                                        <i class="material-icons">keyboard_arrow_down</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--switch-->
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="spinners">
                            <label>Currency</label>
                            <div class="input-group spinner" data-trigger="spinner">
                                <input type="text" class="form-control" value="1" data-rule="currency">
                                <div class="input-group-addon">
                                    <a href="javascript:;" class="spin-up" data-spin="up">
                                        <i class="material-icons">keyboard_arrow_up</i>
                                    </a>
                                    <a href="javascript:;" class="spin-down" data-spin="down">
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--switch-->
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="spinners">
                            <label>Percent:</label>
                            <div class="input-group spinner" data-trigger="spinner">
                                <input type="text" class="form-control" value="1" data-rule="percent">
                                <div class="input-group-addon">
                                    <a href="javascript:;" class="spin-up" data-spin="up">
                                        <i class="material-icons">keyboard_arrow_up</i>
                                    </a>
                                    <a href="javascript:;" class="spin-down" data-spin="down">
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--switch-->
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="spinners">
                            <label>Customize</label>
                            <div class="input-group spinner" data-trigger="spinner" id="customize-spinner">
                                <input type="text" class="form-control" value="0" data-max="200" data-min="0" data-step="2">
                                <div class="input-group-addon">
                                    <a href="javascript:;" class="spin-up" data-spin="up">
                                        <i class="material-icons">keyboard_arrow_up</i>
                                    </a>
                                    <a href="javascript:;" class="spin-down" data-spin="down">
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </a>
                                </div>
                            </div>
                            <p>Event handler: changed</p>
                            <p>
                                Old = <span id="old-val"></span>, New = <span id="new-val"></span>
                            </p>
                        </div>
                    </div>
                    <!--switch -->
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="spinners">
                            <div class="form-group">
                                <label>Disabled</label>
                                <div class="input-group spinner" data-trigger="spinner" id="customize-spinner1">
                                    <input type="text" class="form-control" value="100" data-max="200" data-min="0" data-step="1" disabled="disabled">
                                    <div class="input-group-addon">
                                        <a href="javascript:;" class="spin-up" data-spin="up">
                                            <i class="material-icons">keyboard_arrow_up</i>
                                        </a>
                                        <a href="javascript:;" class="spin-down" data-spin="down">
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.form group -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--col-md-6 ends-->
    </div>
    <!--main content ends-->
</section>
<!-- content -->

    @stop

{{-- page level scripts --}}
@section('footer_scripts')

    <!--touchspin-->
    <script src="{{ asset('vendors/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js') }}" ></script>
    {{--<script type="text/javascript" src="{{ asset('vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}" ></script>--}}
    <!--spinner-->
    <script src="{{ asset('vendors/jquery-spinner/js/jquery.spinner.min.js') }}" ></script>
    <script src="{{ asset('js/pages/pickers.js') }}" ></script>

@stop
