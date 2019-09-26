@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    B.O.T Admin
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')


    <link rel="stylesheet" href="{{ asset('vendors/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/only_dashboard.css') }}"/>
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('vendors/morrisjs/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/dashboard2.css') }}"/>
    <style>
        .card_material{
            font-size: 45px;
        }
    </style>
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Welcome to Dashboard   <span class="hidden-xs header_info">( Dynamic Dashboard )</span></h1>

        <ol class="breadcrumb">
            <li class="active">
                <a href="#">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
        </ol>
    </section>
    <section class="content">
        @if ($analytics_error != 0)
            <div class="alert alert-danger alert-dismissable margin5">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Error:</strong> You Need to add Google Analytics file for full working of the page
            </div>
        @endif
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                <!-- Trans label pie charts strats here-->
                <div class="widget-1">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 text-right">
                                    <span>Visitors</span>

                                    <div class="number" id="myTargetElement3"></div>
                                </div>
                                <span class="widget_circle3 pull-right">
 <i class="material-icons  card_material text-success">visibility</i>
                                </span>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                <!-- Trans label pie charts strats here-->
                <div class="widget-1">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 text-right">
                                    <span>Users</span>

                                    <div class="number" id="myTargetElement4"></div>
                                </div>
                                <span class="widget_circle4 pull-right">
 <i class="material-icons  card_material text-warning">group</i>
                                </span>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
                <!-- Trans label pie charts strats here-->
                <div class="widget-1">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 text-right">
                                    <span>Page Views</span>

                                    <div class="number" id="myTargetElement1"></div>
                                </div>
                                <span class="widget_circle1 pull-right">
 <i class="material-icons  card_material text-danger">flag</i>
                                </span>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
                <!-- Trans label pie charts strats here-->
                <div class="widget-1">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 text-right">
                                    <span>Articles</span>

                                    <div class="number" id="myTargetElement2"></div>
                                </div>
                                <span class="widget_circle2 pull-right">
 <i class="material-icons  card_material text-primary">create</i>
                                </span>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--/row-->
        <div class="row ">
            <div class="col-md-8 col-sm-7 no_padding">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="panel panel-border main_chart">
                            <div class="panel-heading ">
                                <h3 class="panel-title">
                                    <i class="material-icons text-danger">timeline</i> Users Stats
                                </h3>
                            </div>
                            <div class="panel-body">
                                {!! $db_chart->html() !!}

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="panel panel-border roles_chart">

                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="material-icons text-warning">group</i>
                                    User Roles
                                </h4>

                            </div>
                            <div class="panel-body nopadmar">
                                {!! $user_roles->html() !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="panel panel-border">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="material-icons text-success">insert_chart</i>
                                    Yearly visitors
                                </h4>

                            </div>
                            <div class="panel-body nopadmar">
                                <div id="bar_chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <div class="panel panel-border map">

                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="material-icons text-danger">turned_in</i>
                                    Users from countries
                                </h3>

                            </div>
                            <div class="panel-body nopadmar">
                                {!! $geo->html() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5">
                <div class="panel panel-border">
                    <div class="panel-heading border-light">
                        <h3 class="panel-title">
                            <i class="material-icons text-success">group</i>
                            Recent Users
                        </h3>
                    </div>
                    <div class="panel-body nopadmar users">
                        @foreach($users as $user )
                            <div class="media">
                                <div class="media-left">
                                    @if($user->pic)
                                        <img src="{!! url('/').'/uploads/users/'.$user->pic !!}" class="media-object img-circle" >
                                    @else
                                        <img src="{{ asset('images/authors/no_avatar.jpg') }}" class="media-object img-circle" >
                                    @endif
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">{{ $user->full_name }}</h5>
                                    <p>{{ $user->email }}  <span class="user_create_date pull-right">{{ $user->created_at->format('d M') }} </span></p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="panel panel-border">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="material-icons text-info">trending_up</i>
                            This week visitors
                        </h4>

                    </div>
                    <div class="panel-body nopadmar">
                        <div id="visitors_chart"></div>
                    </div>
                </div>
                <div class="panel panel-border">
                    <div class="panel-heading border-light">
                        <h3 class="panel-title">
                            <i class="material-icons text-primary">create</i>
                            Recent Blogs
                        </h3>
                    </div>
                    <div class="panel-body nopadmar blogs">
                        @foreach($blogs as $blog )
                            <div class="media">
                                <div class="media-left">
                                    @if($blog->author->pic)
                                        <img src="{!! url('/').'/uploads/users/'.$blog->author->pic !!}" class="media-object img-circle" >
                                    @else
                                        <img src="{{ asset('images/authors/no_avatar.jpg') }}" class="media-object img-circle" >
                                    @endif
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">{{ $blog->title }}</h5>

                                    <p>category:  {{ $blog->category->title }} <span class="user_create_date pull-right">by  {{ $blog->author->full_name }} </span></p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="editConfirmModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Alert</h4>
                </div>
                <div class="modal-body">
                    <p>You are already editing a row, you must save or cancel that row before edit/delete a new row</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('vendors/moment/js/moment.min.js') }}"></script>
    <!--for calendar-->
    <script src="{{ asset('vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
    <!-- Back to Top-->
    <script type="text/javascript" src="{{ asset('vendors/countUp.js/js/countUp.js') }}"></script>
    {{--<script src="http://demo.lorvent.com/rare/default/vendors/raphael/js/raphael.min.js"></script>--}}
    <script src="{{ asset('vendors/morrisjs/morris.min.js') }}"></script>

    <script>
        var useOnComplete = false,
            useEasing = false,
            useGrouping = false,
            options = {
                useEasing: useEasing, // toggle easing
                useGrouping: useGrouping, // 1,000,000 vs 1000000
                separator: ',', // character to use as a separator
                decimal: '.' // character to use as a decimal
            };
        var demo = new CountUp("myTargetElement1", 12.52, {{ $pageVisits }}, 0, 6, options);
        demo.start();
        var demo = new CountUp("myTargetElement2", 1, {{ $blog_count }}, 0, 6, options);
        demo.start();
        var demo = new CountUp("myTargetElement3", 24.02, {{ $visitors }}, 0, 6, options);
        demo.start();
        var demo = new CountUp("myTargetElement4", 125, {{ $user_count }}, 0, 6, options);
        demo.start();

        $('.blogs').slimScroll({
            color: '#A9B6BC',
            height: 350 + 'px',
            size: '5px'
        });

        var week_data = {!! $month_visits !!};
        var year_data = {!! $year_visits !!};

        function lineChart() {
            Morris.Line({
                element: 'visitors_chart',
                data: week_data,
                lineColors: ['#418BCA', '#00bc8c', '#EF6F6C'],
                xkey: 'date',
                ykeys: ['pageViews', 'visitors'],
                labels: ['pageViews', 'visitors'],
                pointSize: 0,
                lineWidth: 2,
                resize: true,
                fillOpacity: 1,
                behaveLikeLine: true,
                gridLineColor: '#e0e0e0',
                hideHover: 'auto'

            });
        }
        function barChart() {
            Morris.Bar({
                element: 'bar_chart',
                data: year_data.length ? year_data :   [ { label:"No Data", value:100 } ],
                barColors: ['#418BCA', '#00bc8c'],
                xkey: 'date',
                ykeys: ['pageViews', 'visitors'],
                labels: ['pageViews', 'visitors'],
                pointSize: 0,
                lineWidth: 2,
                resize: true,
                fillOpacity: 0.4,
                behaveLikeLine: true,
                gridLineColor: '#e0e0e0',
                hideHover: 'auto'

            });
        }
        lineChart();
        barChart();
        $(".sidebar-toggle").on("click",function () {
            setTimeout(function () {
                $('#visitors_chart').empty();
                $('#bar_chart').empty();
                lineChart();
                barChart();
            },10);
        });

    </script>
    {!! Charts::scripts() !!}
    {!! $db_chart->script() !!}
    {!! $geo->script() !!}
    {!! $user_roles->script() !!}
    {{--{!! $line_chart->script() !!}--}}
@stop
