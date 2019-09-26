@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Sliders
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link rel="stylesheet" href="{{ asset('vendors/ion.rangeslider/css/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/ion.rangeslider/css/ion.rangeSlider.skinFlat.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-slider/css/bootstrap-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/materialsliders/css/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/materialsliders/css/prism.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/materialsliders/css/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/pages/ion.css') }}" />
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <!--section starts-->
                <h1>Sliders</h1>
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
                    <li class="active">Sliders</li>
                </ol>
            </section>
            <!--section ends-->
<section class="content">
    <!--main content-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">tune</i> Ion Range Sliders
                    </h3>
                                <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                </div>
                <div class="panel-body" id="slim1">
                    <!--ion-->
                    <div class="row">
                        <form role="form" class="form-horizontal form-bordered">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Basic Slider</label>
                                    <div class="col-md-10">
                                        <input id="example_1" class="form-control" type="text" name="" value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Money Range</label>
                                    <div class="col-md-10">
                                        <input id="example_2" type="text" name="" value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Gold Range</label>
                                    <div class="col-md-10">
                                        <input id="example_3" type="text" name="" value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Temperature Slider</label>
                                    <div class="col-md-10">
                                        <input id="example_4" type="text" name="" value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Month Slider</label>
                                    <div class="col-md-10">
                                        <input id="example_5" type="text" name="" value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Year Range</label>
                                    <div class="col-md-10">
                                        <input id="example_6" type="text" name="" value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Year Slider</label>
                                    <div class="col-md-10">
                                        <input id="example_7" type="text" name="" value="" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--ion ends-->
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">tune</i> Bootstrap Sliders
                    </h3>
                    <span class="pull-right clickable">
                        <i class="material-icons">keyboard_arrow_up</i>
                    </span>
                </div>
                <div class="panel-body" id="slim2">
                    <!--slider-->
                    <div class="row">
                        <form role="form" class="form-horizontal form-bordered">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Basic Slider</label>
                                    <div class="col-md-10">
                                        <input id="ex1" data-slider-id='ex1Slider' type="text" class="slider form-control" data-slider-handle="square" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Money Range</label>
                                    <div class="col-md-10"> <b>€ 10</b>
                                        <input id="ex2" type="text" data-slider-id='ex2' class="slider form-control" data-slider-handle="square" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]" />
                                        <b class="slider-padding">€ 1000</b>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Color Range</label>
                                    <div class="col-md-10">
                                        <div class="well">
                                            <p>
                                                <b>R</b>
                                                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="255" data-slider-step="1" data-slider-value="128" data-slider-id="RC" id="R" data-slider-tooltip="hide" data-slider-handle="square" />
                                            </p>
                                            <p>
                                                <b>G</b>
                                                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="255" data-slider-step="1" data-slider-value="128" data-slider-id="GC" id="G" data-slider-tooltip="hide" data-slider-handle="round" />
                                            </p>
                                            <p>
                                                <b>B</b>
                                                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="255" data-slider-step="1" data-slider-value="128" data-slider-id="BC" id="B" data-slider-tooltip="hide" data-slider-handle="triangle" />
                                            </p>
                                            <div id="RGB"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Vertical Slider</label>
                                        <div class="col-md-10">
                                            <input id="ex4" type="text" class="slider form-control" data-slider-id='ex4' data-slider-handle="square" data-slider-min="-5" data-slider-max="20" data-slider-step="1" data-slider-value="-3" data-slider-orientation="vertical" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Destroy</label>
                                        <div class="col-md-10">
                                            <input id="ex5" type="text" data-slider-min="-5" data-slider-handle="square" data-slider-max="20" data-slider-step="1" data-slider-value="0"/>
                                            <button type="button" id="destroyEx5Slider" class='btn btn-danger'>Click to Destroy</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Current Range</label>
                                        <div class="col-md-10">
                                            <input id="ex6" type="text" class="slider form-control" data-slider-id='ex6' data-slider-min="-5" data-slider-handle="square" data-slider-max="20" data-slider-step="1" data-slider-value="3" />
                                            <span id="ex6CurrentSliderValLabel">
                                                Current Slider Value:
                                                <span id="ex6SliderVal">3</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" id="slider_enabled">Disable Slider</label>
                                        <div class="col-md-10">
                                            <input id="ex7" type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="5" data-slider-enabled="false" data-slider-handle="square" data-slider-id="RED" />
                                            <input id="ex7-enabled" type="checkbox" class="slider-padding" /> <span id="enable_text">Enabled</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tooltip Slider</label>
                                        <div class="col-md-10">
                                            <input id="ex8" class="slider form-control" data-slider-id='ex8' type="text" data-slider-min="0" data-slider-handle="square" data-slider-max="20" data-slider-step="1" data-slider-value="14" />
                                        </div>
                                    </div>
                                    <div class="form-group last">
                                        <label class="col-md-2 control-label">Precision Slider</label>
                                        <div class="col-md-10">
                                            <input id="ex9" class="slider form-control" data-slider-id='ex9' data-slider-handle="square" type="text" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--slider ends-->
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-success material">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">tune</i> Material Sliders
                    </h3>
                    <span class="pull-right clickable">
                        <i class="material-icons">keyboard_arrow_up</i>
                    </span>
                </div>
                <div class="panel-body">
                    <!--slider-->
                    <!--slider ends-->
                    <!-- noUIslider-->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Color Picker</label>
                        <div class="col-md-10">
                            <div class="view">
                                <div id="colorpicker">
                                    <div class="sliders" id="red"></div>
                                    <div class="sliders" id="green"></div>
                                    <div class="sliders" id="blue"></div>
                                    <div id="result"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Custom connect</label>
                        <div class="col-md-10">
                            <div id="connect"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Using HTML5 input</label>
                        <div class="col-md-10">
                            <div class="example">
                                <div id="html5"></div>
                                <select id="input-select"></select>
                                <input type="number" min="-20" max="40" step="1" id="input-number">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Non linear sliders</label>
                        <div class="col-md-10">
                            <div id="nonlinear"></div>
                            <span class="example-val" id="lower-value"></span>
                            <span id="lower-offset"></span>
                            <span class="example-val" id="upper-value"></span>
                            <span id="upper-offset"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Working with dates</label>
                        <div class="col-md-10">
                            <div id="slider-date"></div>
                            <span class="example-val pull-left" id="event-start"></span>
                            <span class="example-val endslider pull-right" id="event-end"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--main content ends-->
</section>
<!-- content -->


    @stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('vendors/ion.rangeslider/js/ion.rangeSlider.js') }}" ></script>
    <script src="{{ asset('vendors/bootstrap-slider/js/bootstrap-slider.js') }}" ></script>
    <script src="{{ asset('vendors/materialsliders/js/wNumb.js') }}"></script>
    <script src="{{ asset('vendors/materialsliders/js/nouislider.min.js') }}"></script>
   <script src="{{ asset('js/pages/sliders.js') }}"></script>

@stop
