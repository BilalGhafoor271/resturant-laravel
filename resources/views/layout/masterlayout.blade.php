<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restaurant</title>
    <meta name="author" content="Surjith S M">

    <!-- SEO -->
    <meta name="description" content="Tomato is a Responsive HTML5 Template for Restaurants and food related services.">
    <meta name="keywords" content="tomato, responsive, html5, restaurant, template, food, reservation">

    <!-- Favicons -->
    <link rel="shortcut icon" href="img/favicon.ico">

    <!-- Responsive Tag -->
    <meta name="viewport" content="width=device-width">

    <!-- CSS Files -->

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugin.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">

    <!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.4.2.min.js"></script>
        <![endif]-->
</head>

<body data-scroll-animation="true">
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

    <!-- Preloder-->
    <div class="preloder animated">
        <div class="scoket">
            <img src="{{asset('assets/img/preloader.svg')}}" alt="" />
        </div>
    </div>

    <div class="body">

        <div class="main-wrapper">
            <!-- Navigation-->
            <nav class="navbar navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="./index.html">
                            <img src="{{asset('assets/img/nav-logo.png')}}" alt="nav-logo">
                        </a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{ route('index')}}">Home</a></li>
                            <li><a href="{{ route('menu','all')}}">Menu</a></li>
                            <li><a href="{{ route('about')}}">About</a></li>
                            <li><a href="{{ route('gallery')}}">Gallery</a></li>
                            <li><a href="{{ route('shop')}}">Shop</a></li>
                            <li><a href="{{ route('contact')}}">Contact</a></li>
                            @if (!Auth::check())

                                <li><a href="{{ route('login')}}">Login</a></li>
                                <li><a href="{{ route('signup')}}">SignUp</a></li>

                            @else
                            <li><a href="{{ route('user.logout') }}">Logout</a></li>
                            @endif


                            <li class="dropdown">
                                <a class="css-pointer dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart fsc pull-left"></i><span class="cart-number">3</span><span class="caret"></span></a>
                                <div class="cart-content dropdown-menu">
                                    <div class="cart-title">
                                        <h4>Shopping Cart</h4>
                                    </div>
                                    <div class="cart-items">
                                        <div class="cart-item clearfix">
                                            <div class="cart-item-image">
                                                <a href="#"><img src="{{ asset('assets/img/cart-img1.jpg')}}" alt="Breakfast with coffee"></a>
                                            </div>
                                            <div class="cart-item-desc">
                                                <a href="{{ route('shop_cart')}}">Breakfast with coffee</a>
                                                <span class="cart-item-price">$19.99</span>
                                                <span class="cart-item-quantity">x 2</span>
                                                <i class="fa fa-times ci-close"></i>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="cart-action clearfix">
                                        <span class="pull-left checkout-price">$ 114.95</span>
                                        <a class="btn btn-default pull-right" href="{{ route('shop_cart')}}">View Cart</a>
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--/.navbar-collapse -->
                </div>
            </nav>


@yield('content')


                <!-- Footer-->
                <section class="footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <h1>About us</h1>
                                <p>Duis leo justo, condimentum at purus eu,Aenean sed dolor sem. Etiam massa libero, auctor vitae egestas et, accumsan quis nunc.Duis leo justo, condimentum at purus eu, posuere pretium tellus.</p>
                                <a href="./about.html">Read more &rarr;</a>
                            </div>
                            <div class="col-md-4  col-sm-6">
                                <h1>Recent post</h1>
                                <div class="footer-blog clearfix">
                                    <a href="./blog_right_sidebar.html">
                                        <img src="{{ asset('assets/img/thumb8.png')}}" class="img-responsive footer-photo" alt="blog photos">
                                        <p class="footer-blog-text">Hand picked ingredients for our best customers</p>
                                        <p class="footer-blog-date">29 may 2015</p>
                                    </a>
                                </div>
                                <div class="footer-blog clearfix last">
                                    <a href="./blog_right_sidebar.html">
                                        <img src="{{ asset('assets/img/thumb9.png')}}" class="img-responsive footer-photo" alt="blog photos">
                                        <p class="footer-blog-text">Daily special foods that you will going to love</p>
                                        <p class="footer-blog-date">29 may 2015</p>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-4  col-sm-6">
                                <h1>Reach us</h1>
                                <div class="footer-social-icons">
                                    <a href="http://www.facebook.com">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                    <a href="http://www.twitter.com">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="http://plus.google.com">
                                        <i class="fa fa-google"></i>
                                    </a>
                                    <a href="http://www.youtube.com">
                                        <i class="fa fa-youtube-play"></i>
                                    </a>
                                    <a href="http://www.vimeo.com">
                                        <i class="fa fa-vimeo"></i>
                                    </a>
                                    <a href="http://www.pinterest.com">
                                        <i class="fa fa-pinterest-p"></i>
                                    </a>
                                    <a href="http://www.linkedin.com">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </div>
                                <div class="footer-address">
                                    <p><i class="fa fa-map-marker"></i>28 Seventh Avenue, Neew York, 10014</p>
                                    <p><i class="fa fa-phone"></i>Phone: (415) 124-5678</p>
                                    <p><i class="fa fa-envelope-o"></i>support@restaurant.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer - Copyright -->
                    <div class="footer-copyrights">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><i class="fa fa-copyright"></i> 2015.Tomato.All rights reserved. Designed with <i class="fa fa-heart primary-color"></i> by Surjithctly</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>

        <!-- Javascript -->
        <script src="{{ asset('assets/js/vendor/jquery-1.11.2.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/jquery.flexslider-min.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/spectragram.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/velocity.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/velocity.ui.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/bootstrap-clockpicker.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/isotope.pkgd.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/slick.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/wow.min.js')}}"></script>
        <script src="{{ asset('assets/js/animation.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/vegas/vegas.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/jquery.mb.YTPlayer.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/jquery.stellar.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/mc/jquery.ketchup.all.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/mc/main.js')}}"></script>
        <script src="{{ asset('assets/js/vendor/validate.js')}}"></script>
        <script src="{{ asset('assets/js/reservation.js')}}"></script>
        <!-- Main JS -->
        <script src="{{ asset('assets/js/main.js')}}"></script>

    </body>

    </html>

