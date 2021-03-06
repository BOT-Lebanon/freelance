@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Circle Sliders
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <!--section starts-->
        <h1>Circle sliders</h1>
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
            <li class="active">Circle sliders</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <!--main content-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons ">star</i> Circle Dials
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <!--knob-->
                        <div class="row visible-ie8">
                            <div class="col-md-12">
                                <div class="alert alert-warning alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                    The Circle Dial plugin is not compatible with Internet Explorer 8 and older.
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row text-center">
                                <div class="col-md-3 col-sm-3 col-xs-offset-2 col-xs-10">
                                    <div class="text-left">Disable</div>
                                    <input class="knob" data-width="140" data-height="140" data-fgColor="#418bca" data-displayinput=false
                                           value="35">
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-offset-2 col-xs-10">
                                    <div class="text-left">Cursor</div>
                                    <input class="knob" data-width="140" data-height="140" data-cursor=true data-fgColor="#00bc8c"
                                           data-thickness=.3 value="29">
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-offset-2 col-xs-10">
                                    <div class="text-left">Display previous</div>
                                    <input class="knob" data-width="140" data-height="140" data-fgColor="#5bc0de" data-min="-100"
                                           data-displayprevious=true value="44">
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-offset-2 col-xs-10">
                                    <div class="text-left">Angle offset</div>
                                    <input class="knob" data-angleoffset="90" data-fgcolor="#EF6F6C" data-width="140" data-height="140"
                                           value="35">
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-md-3 col-sm-3 col-xs-offset-2 col-xs-10">
                                    <div class="text-left">Angle offset arc</div>
                                    <input class="knob" data-angleoffset="-125" data-anglearc="250"
                                           data-fgcolor="#EF6F6C" data-width="140" data-height="140" value="35">
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-offset-2 col-xs-10">
                                    <div class="text-left">5-digit values</div>
                                    <input class="knob" data-min="-15000" data-fgColor="#5bc0de" data-max="15000"
                                           data-width="140" data-height="140" value="-11000">
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-offset-2 col-xs-10">
                                    <div class="text-left">Responsive</div>
                                    <input class="knob" data-width="140" data-height="140" data-fgColor="#00bc8c" value="35">
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-offset-2 col-xs-10">
                                    <div class="text-left">Readonly</div>
                                    <input class="knob" data-fgColor="#418bca" data-thickness=".4" data-width="140" data-height="140"
                                           readonly value="22">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--knob ends-->
                </div>
            </div>
        </div>
    </section>
    <!-- content -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script src="{{ asset('vendors/jquery-knob/js/jquery.knob.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pages/knob_page.js') }}" type="text/javascript"></script>

@stop
