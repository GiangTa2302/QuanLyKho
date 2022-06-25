{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html> --}}

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>FPT shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="{{asset('assets/clients/img/favicon.png')}}" type="image/png">

    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/clients/css/vendor/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/vendor/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/vendor/plaza-icon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/vendor/bootstrap.min.css')}}">
    
    <!-- Plugin CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/clients/css/plugin/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/plugin/material-scrolltop.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/plugin/price_range_style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/plugin/in-number.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/plugin/venobox.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/clients/css/main.css')}}">
</head>

<body>
    <!-- ::::::  Start  Header Section  ::::::  -->
    <header>
        <!-- ::::::  Start Large Header Section  ::::::  -->
        <div class="header header--1">
    
            <!-- Start Header Middle area -->
            <div class="header__middle header__top--style-1 p-tb-30">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2">
                            <div class="header__logo">
                                <a href="{{route('home')}}" class="header__logo-link">
                                    <img src="assets/clients/img/logo/logo.jpg" alt="" class="header__logo-img">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="row align-items-center">
                                <div class="col-lg-7">
                                    <form class="header__search-form" action="#">
                                        <div class="header__search-input">
                                            <input type="search" placeholder="Nhập sản phẩm cần tìm">
                                            <button class="btn btn--submit btn--blue btn--uppercase btn--weight " type="submit">Tìm kiếm</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-5">
                                    <div class="header__wishlist-box ml-5">
    
                                        <!-- Start Header Add Cart Box -->
                                        <div class="header-add-cart pos-relative ml-5">
                                            <a href="{{route('user.cart')}}" class="">
                                                <i class="icon-shopping-cart"></i>
                                                <span class="wishlist-item-count pos-absolute">
                                                    @if (session('cart'))
                                                        @php
                                                            echo count(session('cart'));
                                                        @endphp
                                                    @else
                                                        0
                                                    @endif
                                                </span>
                                            </a>
                                        </div> <!-- End Header Add Cart Box -->
    
                                        @if(Route::has('login'))
                                        @auth
                                            @if(Auth::user()->is_admin == 2)
                                            <div class="user-info ml-5">
                                                <a class="user-set-role__button" href="#" data-toggle="dropdown" aria-haspopup="true">
                                                    ({{Auth::user()->name}}) 
                                                </a>
                                                <ul class="expand-dropdown-menu dropdown-menu" >
                                                    <li><a href="{{route('user.myAccount',['id'=>Auth::user()->id])}}">Tài khoản của tôi</a></li>
                                                    <form id="logout-form" method="POST" action="{{route('logout')}}">
                                                    <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a></li>
                                                    <form id="logout-form" method="POST" action="{{route('logout')}}">
                                                        @csrf
                                                    </form>
                                                </ul>
                                            </div>
                                            @else
                                            <div class="user-info ml-5">
                                                <a class="user-set-role__button" href="#" data-toggle="dropdown" aria-haspopup="true">
                                                    {{Auth::user()->name}}
                                                </a>
                                                <ul class="expand-dropdown-menu dropdown-menu" >
                                                    <li><a href="{{route('user.myAccount',['id'=>Auth::user()->id])}}">Tài khoản của tôi</a></li>
                                                    <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a></li>
                                                    <form id="logout-form" method="POST" action="{{route('logout')}}">
                                                        @csrf
                                                        
                                                    </form>
                                                </ul>
                                            </div>
                                            @endif
                                        @else
                                        <div class="ml-5" style="font-size:14px;width:80%;">
                                            <a href="{{route('login')}}">Đăng nhập</a>
                                            /
                                            <a href="{{route('register')}}">Đăng ký</a>
                                        </div>
                                        @endif
                                    @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Header Middle area -->
    
            @include('clients.header')
    
            </div> <!-- ::::::  End Large Header Section  ::::::  -->
    
        <!-- ::::::  Start Mobile Header Section  ::::::  -->
        <div class="header__mobile mobile-header--1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Start Header Mobile Top area -->
                        <div class="header__mobile-top">
                            <div class="mobile-header__logo">
                                <a href="{{route('home')}}" class="mobile-header__logo-link">
                                    <img src="assets/clients/img/logo/logo.jpg" alt="" class="mobile-header__logo-img">
                                </a>
                            </div>
                            <div class="header__wishlist-box">
                                <!-- Start Header Wishlist Box -->
                                <div class="header__wishlist pos-relative">
                                    <a href="wishlist.html" class="header__wishlist-link">
                                        <i class="icon-heart"></i>
                                        <span class="wishlist-item-count pos-absolute">3</span>
                                    </a>
                                </div> <!-- End Header Wishlist Box -->
    
                                <!-- Start Header Add Cart Box -->
                                <div class="header-add-cart pos-relative m-l-20">
                                    <a href="#offcanvas-add-cart__box" class="header__wishlist-link offcanvas--open-checkout offcanvas-toggle">
                                        <i class="icon-shopping-cart"></i>
                                        <span class="wishlist-item-count pos-absolute">3</span>
                                    </a>
                                </div> <!-- End Header Add Cart Box -->
    
                                <a href="#offcanvas-mobile-menu" class="offcanvas-toggle m-l-20"><i class="icon-menu"></i></a>
    
                            </div>
                        </div> <!-- End Header Mobile Top area -->
    
                        <!-- Start Header Mobile Middle area -->
                        <div class="header__mobile-middle header__top--style-1 p-tb-10">
                            <form class="header__search-form" action="#">
                                <div class="header__search-input header__search-input--mobile">
                                    <input type="search" placeholder="Nhập sản phẩm cần tìm">
                                    <button class="btn btn--submit btn--blue btn--uppercase btn--weight" type="submit"><i class="fal fa-search"></i></button>
                                </div>
                            </form>
                        </div> 
                        <!-- End Header Mobile Middle area -->
    
                    </div>
                </div>
            </div>
        </div> 
        <div class="offcanvas-overlay"></div>
    </header>
    <!-- ::::::  End  Header Section  ::::::  -->      
    
    <!-- ::::::  Start  Main Container Section  ::::::  -->
   <div class="content">
    {{ $slot }}
   </div>
    <!-- ::::::  End  Main Container Section  ::::::  -->

    <!-- ::::::  Start  Footer Section  ::::::  -->
    <footer class="footer">
        <div class="footer__top gray-bg p-tb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="footer__about">
                            <div class="footer__logo">
                                <a href="index.html" class="footer__logo-link">
                                    <img src="assets/clients/img/logo/logo.jpg" alt="" class="footer__logo-img">
                                </a>
                            </div>
                            <div class="footer__text">
                                <p>We are a team of designers & developers that create high quality Magento, Prestashop, Opencart.</p>
                            </div>
                            <ul class="footer__address">
                                <li class="footer__address-item"><span>Address:</span> The Barn, Ullenhall, Henley in Arden B578 5C, England.</li>
                                <li class="footer__address-item"><span>Call us: </span> <a href="tel:+(012)-800-456-789-987">+(012) 800 456 789 - 987</a> </li>
                                <li class="footer__address-item"><span>Call us: </span> <a href="mailto:tagiang2001thi@gmail.com">tagiang2001thi@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="footer__menu">
                            <h4 class="footer__nav-title">Products</h4>
                            <ul class="footer__nav">
                                <li class="footer__list"><a href="" class="footer__link">Prices drop</a></li>
                                <li class="footer__list"><a href="" class="footer__link">New products</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Best sales</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Contact us</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Sitemap</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Login</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="footer__menu">
                            <h4 class="footer__nav-title">Our Company</h4>
                            <ul class="footer__nav">
                                <li class="footer__list"><a href="" class="footer__link">Delivery</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Legal Notice</a></li>
                                <li class="footer__list"><a href="" class="footer__link">About us</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Secure payment</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Sitemap</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Stores</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="footer__menu">
                                    <h4 class="footer__nav-title">Follow Us</h4>
                                    <ul class="footer__social-nav">
                                        <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-twitter"></i></a></li>
                                        <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-youtube"></i></a></li>
                                        <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="footer__form">
                                    <h4 class="footer__nav-title">Join Our Newsletter Now</h4>
                                    <form action="#" class="footer__form-box">
                                        <input type="email" placeholder="Your email address">
                                        <button class="btn btn--submit btn--blue btn--uppercase btn--weight " type="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-12">
                        <div class="footer__copyright-text">
                            <p>Copyright by group 3</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="footer__payment">
                            <a href="https://hasthemes.com/" class="footer__payment-link">
                                <img src="assets/clients/img/company-logo/payment.png" alt="" class="footer__payment-img">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ::::::  End  Footer Section  ::::::  -->
    
    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

    <!-- Start Modal Add cart -->
    <div class="modal fade" id="modalAddCart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title text-center">Product Successfully Added To Your Shopping Cart</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="modal__product-img">
                                        <img class="img-fluid" src="assets/img/product/size-normal/product-home-1-img-1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <span class="modal__product-title">SonicFuel Wireless Over-Ear Headphones</span>
                                    <span class="modal__product-price m-tb-15">$31.59</span>
                                    <ul class="modal__product-info ">
                                        <li>Size:<span> S</span></li>
                                        <li>Quantity:<span>3</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 modal__border">
                            <span class="modal__product-cart-item">There are 3 items in your cart.</span>
                            <ul class="modal__product-shipping-info m-tb-15">
                                <li>Total products:<span>$94.78</span></li>
                                <li>Total shipping:<span>$7.00</span></li>
                                <li>Taxes:<span>$0.00</span></li>
                                <li>Total: <span>$101.78 (tax excl.)</span></li>
                            </ul>
                            
                            <div class="modal__product-cart-buttons">
                                <a href="#" class="btn btn--box btn--large btn--blue btn--uppercase btn--weight" data-dismiss="modal">Continue Shopping</a>
                                <a href="checkout.html" class="btn btn--box btn--large btn--blue btn--uppercase btn--weight">Process to checkout</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div> <!-- End Modal Add cart -->


    <!-- ::::::::::::::All Javascripts Files here ::::::::::::::-->

    <!-- Vendor JS Files -->
    <script src="{{asset('assets/clients/js/vendor/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('assets/clients/js/vendor/modernizr-3.7.1.min.js')}}"></script>
    <script src="{{asset('assets/clients/js/vendor/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/clients/js/vendor/bootstrap.bundle.js')}}"></script>

    <!-- Plugins JS Files -->
    <script src="{{asset('assets/clients/js/plugin/swiper.min.js')}}"></script>
    <script src="{{asset('assets/clients/js/plugin/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('assets/clients/js/plugin/material-scrolltop.js')}}"></script>
    <script src="{{asset('assets/clients/js/plugin/price_range_script.js')}}"></script>
    <script src="{{asset('assets/clients/js/plugin/in-number.js')}}"></script>
    <script src="{{asset('assets/clients/js/plugin/jquery.elevateZoom-3.0.8.min.js')}}"></script>
    <script src="{{asset('assets/clients/js/plugin/venobox.min.js')}}"></script>

    <script src="{{asset('assets/clients/js/main.js')}}"></script>
</body>

</html>


