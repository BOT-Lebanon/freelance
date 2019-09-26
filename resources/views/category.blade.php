@extends('layouts/default')

{{-- Page title --}}
@section('title')
Categories
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/cart.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/frontend/tabbular.css') }}">
    <!--end of page level css-->
@stop

{{-- breadcrumb --}}
@section('top')
    <div class="breadcum">
        <div class="container">
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">     <i class="fa fa-home icon3" ></i>Dashboard
                    </a>
                </li>
                <li class="hidden-xs">
                    <i class="fa fa-angle-double-right icon3 text-success"></i>
                    <a href="#">Categories</a>
                </li>
            </ol>
            <div class="pull-right">
                <i class="fa fa-pencil-square-o icon3 " ></i> Categories
            </div>
        </div>
    </div>
    @stop


{{-- Page content --}}
@section('content')
    <!-- Container Section Start -->
    <div class="container">
        <!--recently view item-->
        <div class="row">
            <h2 class="text-primary"> Categories</h2>
            <div class="divider"></div>
            <div class="flip-3d">
                <figure>
                    <img src="{{ asset('images/cart/default/saree1.jpg') }}" alt="product image">
                    <figcaption>
                        <h4 class="text-white">Floral Printed Saree</h4>
                        <ul class="hidden-xs">
                            <li>Product Type - Women's Saree</li>
                            <li>Color - Multi Colour</li>
                        </ul>
                        <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1599.00</del>  Rs. 1198.00   </h4>
                    </figcaption>
                </figure>
                <div class="text-center mart10">
                    <a href="{{ URL::to('single_product') }}" class="btn btn-primary text-white">View</a></div>
            </div>
            <div class="flip-3d">
                <figure>
                    <img src="{{ asset('images/cart/default/saree3.jpg') }}" alt="product image">
                    <figcaption>
                        <h4 class="text-white">Floral Printed Saree</h4>
                        <ul class="hidden-xs">
                            <li>Product Type - Women's Saree</li>
                            <li>Color - Multi Colour</li>
                        </ul>
                        <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                    </figcaption>
                </figure>
                <div class="text-center mart10">
                    <a href="{{ URL::to('single_product') }}" class="btn btn-primary text-white">View</a></div>
            </div>
            <div class="flip-3d">
                <figure>
                    <img src="{{ asset('images/cart/default/saree4.jpg') }}" alt="product image">
                    <figcaption>
                        <h4 class="text-white">Floral Printed Saree</h4>
                        <ul class="hidden-xs">
                            <li>Product Type - Women's Saree</li>
                            <li>Color - Multi Colour</li>
                        </ul>
                        <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                    </figcaption>
                </figure>
                <div class="text-center mart10">
                    <a href="{{ URL::to('single_product') }}" class="btn btn-primary text-white">View</a></div>
            </div>
            <div class="flip-3d">
                <figure>
                    <img src="{{ asset('images/cart/default/saree5.jpg') }}" alt="product image">
                    <figcaption>
                        <h4 class="text-white">Floral Printed Saree</h4>
                        <ul class="hidden-xs">
                            <li>Product Type - Women's Saree</li>
                            <li>Color - Multi Colour</li>
                        </ul>
                        <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                    </figcaption>
                </figure>
                <div class="text-center mart10">
                    <a href="{{ URL::to('single_product') }}" class="btn btn-primary text-white">View</a></div>
            </div>
        </div>
        <div class="row">
            <div class="divider"></div>
            <div class="flip-3d">
                <figure>
                    <img src="{{ asset('images/cart/default/saree6.jpg') }}" alt="product image">
                    <figcaption>
                        <h4 class="text-white">Floral Printed Saree</h4>
                        <ul class="hidden-xs">
                            <li>Product Type - Women's Saree</li>
                            <li>Color - Multi Colour</li>
                        </ul>
                        <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                    </figcaption>
                </figure>
                <div class="text-center mart10">
                    <a href="{{ URL::to('single_product') }}" class="btn btn-primary text-white">View</a></div>
            </div>
            <div class="flip-3d">
                <figure>
                    <img src="{{ asset('images/cart/default/saree7.jpg') }}" alt="product image">
                    <figcaption>
                        <h4 class="text-white">Floral Printed Saree</h4>
                        <ul class="hidden-xs">
                            <li>Product Type - Women's Saree</li>
                            <li>Color - Multi Colour</li>
                        </ul>
                        <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                    </figcaption>
                </figure>
                <div class="text-center mart10">
                    <a href="{{ URL::to('single_product') }}" class="btn btn-primary text-white">View</a></div>
            </div>
            <div class="flip-3d">
                <figure>
                    <img src="{{ asset('images/cart/default/saree8.jpg') }}" alt="product image">
                    <figcaption>
                        <h4 class="text-white">Floral Printed Saree</h4>
                        <ul class="hidden-xs">
                            <li>Product Type - Women's Saree</li>
                            <li>Color - Multi Colour</li>
                        </ul>
                        <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                    </figcaption>
                </figure>
                <div class="text-center mart10">
                    <a href="{{ URL::to('single_product') }}" class="btn btn-primary text-white">View</a></div>
            </div>
            <div class="flip-3d">
                <figure>
                    <img src="{{ asset('images/cart/default/saree9.jpg') }}" alt="product image">
                    <figcaption>
                        <h4 class="text-white">Floral Printed Saree</h4>
                        <ul class="hidden-xs">
                            <li>Product Type - Women's Saree</li>
                            <li>Color - Multi Colour</li>
                        </ul>
                        <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                    </figcaption>
                </figure>
                <div class="text-center mart10">
                    <a href="{{ URL::to('single_product') }}" class="btn btn-primary text-white">View</a></div>
            </div>
        </div>
        <div class="row">
            <div class="divider"></div>
            <div class="flip-3d">
                <figure>
                    <img src="{{ asset('images/cart/default/saree10.jpg') }}" alt="product image">
                    <figcaption>
                        <h4 class="text-white">Floral Printed Saree</h4>
                        <ul class="hidden-xs">
                            <li>Product Type - Women's Saree</li>
                            <li>Color - Multi Colour</li>
                        </ul>
                        <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                    </figcaption>
                </figure>
                <div class="text-center mart10">
                    <a href="{{ URL::to('single_product') }}" class="btn btn-primary text-white">View</a></div>
            </div>
            <div class="flip-3d">
                <figure>
                    <img src="{{ asset('images/cart/default/saree11.jpg') }}" alt="product image">
                    <figcaption>
                        <h4 class="text-white">Floral Printed Saree</h4>
                        <ul class="hidden-xs">
                            <li>Product Type - Women's Saree</li>
                            <li>Color - Multi Colour</li>
                        </ul>
                        <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                    </figcaption>
                </figure>
                <div class="text-center mart10">
                    <a href="{{ URL::to('single_product') }}" class="btn btn-primary text-white">View</a></div>
            </div>
            <div class="flip-3d">
                <figure>
                    <img src="{{ asset('images/cart/default/saree12.jpg') }}" alt="product image">
                    <figcaption>
                        <h4 class="text-white">Floral Printed Saree</h4>
                        <ul class="hidden-xs">
                            <li>Product Type - Women's Saree</li>
                            <li>Color - Multi Colour</li>
                        </ul>
                        <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                    </figcaption>
                </figure>
                <div class="text-center mart10">
                    <a href="{{ URL::to('single_product') }}" class="btn btn-primary text-white">View</a></div>
            </div>
            <div class="flip-3d">
                <figure>
                    <img src="{{ asset('images/cart/default/saree7.jpg') }}" alt="product image">
                    <figcaption>
                        <h4 class="text-white">Floral Printed Saree</h4>
                        <ul class="hidden-xs">
                            <li>Product Type - Women's Saree</li>
                            <li>Color - Multi Colour</li>
                        </ul>
                        <h4 class="text-white hidden-xs"><del class="text-danger">Rs. 1999.00</del> Rs. 1499.00</h4>
                    </figcaption>
                </figure>
                <div class="text-center mart10">
                    <a href="{{ URL::to('single_product') }}" class="btn btn-primary text-white">View</a></div>
            </div>
        </div>
        <!--recently view item end-->
    </div>

@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop
