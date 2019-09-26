@extends('layouts/defaultthank')

{{-- Page title --}}
@section('title')
    View User Details
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/owl.carousel/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/owl.carousel/css/owl.theme.css') }}">
    <!--end of page level css-->
@stop

@section('top')
    <!--Carousel Start -->
    <div id="owl-demo" class="owl-carousel owl-theme">
        <div class="item"><img src="{{ asset('img/Photo-1.png') }}" alt="slider-image">
        </div>
        <div class="item"><img src="{{ asset('images/Photo-2.png') }}" alt="slider-image">
        </div>

    </div>
    <!-- //Carousel End -->
@stop
@section('content')

    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
@stop

{{-- footer scripts --}}
@section('footer_scripts')
    <!-- page level js starts-->
    <script type="text/javascript" src="{{ asset('js/frontend/jquery.circliful.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/wow/js/wow.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('vendors/owl.carousel/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/frontend/carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/frontend/index.js') }}"></script>
    <!--page level js ends-->
@stop
