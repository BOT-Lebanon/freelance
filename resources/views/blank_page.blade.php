@extends('layouts/default')

{{-- Page title --}}
@section('title')
Blank
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop
{{-- breadcrumb --}}
@section('top')
    <div class="breadcum">
        <div class="container">
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}"> <i class="fa fa-home icon3" ></i>Dashboard
                    </a>
                </li>
                <li class="hidden-xs">
                    <i class="fa fa-angle-double-right icon3 text-success"></i>
                    <a href="#">Blank Page</a>
                </li>
            </ol>
            <div class="pull-right">
                <i class="fa fa-pencil icon3 " ></i> Blank Page
            </div>
        </div>
    </div>
    @stop


{{-- Page content --}}
@section('content')
    <!-- Container Section Start -->
    <div class="container">
        <!--Content Section Start -->
        <h2> &nbsp;&nbsp; write your content here</h2>
        <div style="height:350px;"></div>
        <!-- //Content Section End -->
    </div>
    
@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop
