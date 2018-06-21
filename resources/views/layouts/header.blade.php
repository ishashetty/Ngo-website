<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{ URL::to('css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
    <script src="{!!url('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js')!!}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="{{URL::to('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{URL::to('css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{URL::to('css/price-range.css') }}" rel="stylesheet">
    <link href="{{URL::to('css/animate.css') }}" rel="stylesheet">
    <link href="{{URL::to('css/main1.css') }}" rel="stylesheet">
    <link href="{{URL::to('css/star.css') }}" rel="stylesheet">

	<link href="{{URL::to('css/responsive.css') }}" rel="stylesheet">
  
    <link href="{{URL::to('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{URL::to('css/owl.theme.css') }}" rel="stylesheet">

    <link href="{{URL::to('css/owl.transition.css') }}" rel="stylesheet">
    <script></script>
    </head>
<body>
    @include('layouts.validation_msgs')

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{url ('/') }}"><img src="{{URL::to('images/home/logo1.png') }}" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                             @if(!empty(session('email')))
                            <li><a href="{{url ('checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                        <li><a href="{{url ('cart') }}"><i class="fa fa-shopping-cart"></i> Cart
                            <b>
                            ({{session('cart')}})</b>
                            
                        </a></li>
                        <li><a href="{{url ('orders') }}"><i class="fa fa-user"></i> My Orders</a></li>

                            <li><a href="/logout" onclick='document.location.href = "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://localhost";'> <i class="fa fa-sign-out fa-fw"></i> Logout </a></li>
                                {{-- <li><p>WELCOME {{session('email')}}</p><li> --}}
                             @else 
                             <li><a href="{{url ('checkout') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                             <li><a href="{{url ('cart') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                             <li><a href="{{url ('orders') }}"><i class="fa fa-user"></i> My Orders</a></li>
                             <li><a href="{{url ('auth/google') }}"><i class="fa fa-lock"></i> Login</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom">{{--header-bottom--}}
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{url ('/') }}" class="active">Home</a></li>
                            <li class="dropdown"><a >Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{url('shop/bags')}}" id="bags">Bags</a></li>
                                    <li><a href="{{url('shop/toys')}}" id="toys">Toys</a></li>
                                    <li><a href="{{url('shop/mats')}}">Mats</a></li>
                                    {{--  <li><a href="{{url ('/product-details') }}">Product Details</a></li>   --}}
                                    {{-- <li><a href="{{url ('eshopper/checkout') }}">Checkout</a></li>  --}}
                                    {{-- <li><a href="{{url ('eshopper/cart') }}">Cart</a></li>  --}}
                                     
                                </ul>
                            </li> 
                           
                            <li><a href="{{url ('/contact-us') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="search_box ">
                        <form action="{{url('/search')}}">
                        <input type="text" name="searchData" placeholder="Search Items"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@yield('body')

{{-- Footer --}}
<footer id="footer"><!--Footer-->
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Online Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Change Location</a></li>
                            <li><a href="#">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Quock Shop</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">T-Shirt</a></li>
                            <li><a href="#">Mens</a></li>
                            <li><a href="#">Womens</a></li>
                            <li><a href="#">Gift Cards</a></li>
                            <li><a href="#">Shoes</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privecy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">Billing System</a></li>
                            <li><a href="#">Ticket System</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Company Information</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">Affillate Program</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © Vesit. All rights reserved.</p>
                <p class="pull-right">Designed by VESIT<span></p>
            </div>
        </div>
    </div>
    
</footer>{{--/Footer--}}



</body>
</html>
    <link href="{{URL::to('css/responsive.css') }}" rel="stylesheet">
    <link href="{{URL::to('css/style1.css') }}" rel="stylesheet">
    <link href="{{URL::to('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{URL::to('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{URL::to('css/owl.transition.css') }}" rel="stylesheet">
</html>
<script src="{{URL::to('js/jquery.js') }}"></script>
<script src="{{URL::to('js/bootstrap.min.js') }}"></script>
<script src="{{URL::to('js/jquery.scrollUp.min.js') }}"></script>
<script src="{{URL::to('js/price-range.js') }}"></script>
<script src="{{URL::to('js/jquery.prettyPhoto.js') }}"></script>
<script src="{{URL::to('js/main.js') }}"></script>
<script src="{{URL::to('js/main1.js') }}"></script>
<script src="js/jquery-1.11.0.min.js"></script>
<!-- <script src="js/bootstrap.min.js"></script> -->
<script src="{{URL::to('js/jquery.cookie.js') }}"></script>
<script src="{{URL::to('js/waypoints.min.js') }}"></script>
<script src="{{URL::to('js/modernizr.js') }}"></script>
{{--  <script src="{{URL::to('js/bootstrap-hover-dropdown.js') }}"></script>  --}}
<script src="{{URL::to('js/owl.carousel.min.js') }}"></script>
<script src="{{URL::to('js/front.js') }}"></script>
{{-- <script src="{{URL::to('js/ajax.js') }}"></script> --}}

    