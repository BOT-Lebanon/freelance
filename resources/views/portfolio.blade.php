@extends('layouts/default')

{{-- Page title --}}
@section('title')
Portfolio
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/portfolio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/fancybox/jquery.fancybox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/fancybox/helpers/jquery.fancybox-buttons.css') }}">
    <!--end of page level css-->
@stop

{{-- breadcrumb --}}
@section('top')
    <div class="breadcum">
        <div class="container">
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">    <i class="fa fa-home icon3" ></i>Dashboard
                    </a>
                </li>
                <li class="hidden-xs">
                    <i class="fa fa-angle-double-right icon3 text-success"></i>
                    <a href="#">Portfolio</a>
                </li>
            </ol>
            <div class="pull-right">
                <i class="fa fa-suitcase icon3 " ></i> Portfolio
            </div>
        </div>
    </div>
    @stop


{{-- Page content --}}
@section('content')
    <!-- Container Section Start -->
    <div class="container">
        <h2 id="portfolio_title">Portfolio</h2>
        <!-- Images Section Start -->
        <div class="col-md-12" style="padding: 0">
            <div id="gallery">
                <div id="portfolio_btns">
                    <button class=" btn filter btn-primary" data-filter="all">ALL</button>
                    <button class="btn filter btn-primary" data-filter=".category-1">HTML</button>
                    <button class=" btn filter btn-primary" data-filter=".category-2">BOOTSTRAP</button>
                </div>
                <div>
                    <div class="mix category-1" data-my-order="1">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <a class="fancybox" href="{{ asset('images/gallery/10.jpg') }}"><i class="fa fa-search-plus"></i></a>
                            <a href="{{ URL::to('portfolioitem') }}"><i class="fa fa-link"></i></a>
                        </div>
                        <div class="thumb_zoom"><img src="{{ asset('images/gallery/10.jpg') }}" class="img-responsive"> </div>
                    </div>
                    <div class="mix category-1" data-my-order="2">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <a class="fancybox" href="{{ asset('images/gallery/8.jpg') }}"><i class="fa fa-search-plus"></i></a>
                            <a href="{{ URL::to('portfolioitem') }}"><i class="fa fa-link"></i></a>
                        </div>
                        <div class="thumb_zoom"><img src="{{ asset('images/gallery/8.jpg') }}" class="img-responsive"> </div>
                    </div>
                    <div class="mix category-2" data-my-order="3">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <a class="fancybox" href="{{ asset('images/gallery/7.jpg') }}"><i class="fa fa-search-plus"></i></a>
                            <a href="{{ URL::to('portfolioitem') }}"><i class="fa fa-link"></i></a>
                        </div>
                        <div class="thumb_zoom"><img src="{{ asset('images/gallery/7.jpg') }}" class="img-responsive"> </div>
                    </div>
                    <div class="mix category-1" data-my-order="4">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <a class="fancybox" href="{{ asset('images/16.jpg') }}"><i class="fa fa-search-plus"></i></a>
                            <a href="{{ URL::to('portfolioitem') }}"><i class="fa fa-link"></i></a>
                        </div>
                        <div class="thumb_zoom"><img src="{{ asset('images/16.jpg') }}" class="img-responsive"> </div>
                    </div>
                    <div class="mix category-2" data-my-order="5">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <a class="fancybox" href="{{ asset('images/gallery/5.jpg') }}"><i class="fa fa-search-plus"></i></a>
                            <a href="{{ URL::to('portfolioitem') }}"><i class="fa fa-link"></i></a>
                        </div>
                        <div class="thumb_zoom"><img src="{{ asset('images/gallery/5.jpg') }}" class="img-responsive"> </div>
                    </div>
                    <div class="mix category-2" data-my-order="6">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <a class="fancybox" href="{{ asset('images/gallery/4.jpg') }}"><i class="fa fa-search-plus"></i></a>
                            <a href="{{ URL::to('portfolioitem') }}"><i class="fa fa-link"></i></a>
                        </div>
                        <div class="thumb_zoom"><img src="{{ asset('images/gallery/4.jpg') }}" class="img-responsive"> </div>
                    </div>
                    <div class="mix category-1" data-my-order="7">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <a class="fancybox" href="{{ asset('images/gallery/3.jpg') }}"><i class="fa fa-search-plus"></i></a>
                            <a href="{{ URL::to('portfolioitem') }}"><i class="fa fa-link"></i></a>
                        </div>
                        <div class="thumb_zoom"><img src="{{ asset('images/gallery/3.jpg') }}" class="img-responsive"> </div>
                    </div>
                    <div class="mix category-2" data-my-order="8">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <a class="fancybox" href="{{ asset('images/gallery/2.jpg') }}"><i class="fa fa-search-plus"></i></a>
                            <a href="{{ URL::to('portfolioitem') }}"><i class="fa fa-link"></i></a>
                        </div>
                        <div class="thumb_zoom"><img src="{{ asset('images/gallery/2.jpg') }}" class="img-responsive"> </div>
                    </div>
                    <div class="mix category-2" data-my-order="8">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <a class="fancybox" href="{{ asset('images/gallery/1.jpg') }}"><i class="fa fa-search-plus"></i></a>
                            <a href="{{ URL::to('portfolioitem') }}"><i class="fa fa-link"></i></a>
                        </div>
                        <div class="thumb_zoom"><img src="{{ asset('images/gallery/1.jpg') }}" class="img-responsive"> </div>
                    </div>
                    <div class="mix category-1" data-my-order="8">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <a class="fancybox" href="{{ asset('images/gallery/11.jpg') }}"><i class="fa fa-search-plus"></i></a>
                            <a href="{{ URL::to('portfolioitem') }}"><i class="fa fa-link"></i></a>
                        </div>
                        <div class="thumb_zoom"><img src="{{ asset('images/gallery/11.jpg') }}" class="img-responsive"> </div>
                    </div>
                    <div class="mix category-1" data-my-order="8">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <a class="fancybox" href="{{ asset('images/gallery/12.jpg') }}"><i class="fa fa-search-plus"></i></a>
                            <a href="{{ URL::to('portfolioitem') }}"><i class="fa fa-link"></i></a>
                        </div>
                        <div class="thumb_zoom"><img src="{{ asset('images/gallery/12.jpg') }}" class="img-responsive"> </div>
                    </div>
                    <div class="mix category-2" data-my-order="8">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <a class="fancybox" href="{{ asset('images/gallery/9.jpg') }}"><i class="fa fa-search-plus"></i></a>
                            <a href="{{ URL::to('portfolioitem') }}"><i class="fa fa-link"></i></a>
                        </div>
                        <div class="thumb_zoom"><img src="{{ asset('images/gallery/9.jpg') }}" class="img-responsive"> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //Images Section End -->
    </div>
    <!-- Container Section End -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- page level js starts-->
    <script type="text/javascript" src="{{ asset('vendors/mixitup/jquery.mixitup.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/fancybox/jquery.fancybox.pack.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/fancybox/helpers/jquery.fancybox-buttons.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/fancybox/helpers/jquery.fancybox-media.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/frontend/portfolio.js') }}"></script>
    <!--page level js ends-->

@stop
