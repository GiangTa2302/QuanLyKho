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
    
            <!-- Start Header Menu Area -->
            <div class="header-menu">
                <div class="container">
                    <div class="row col-12">
                        <nav>
                            <ul class="header__nav">
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                    <a href="{{route('home')}}" class="header__nav-link">TRANG CHỦ</i></a>                                
                                </li> <!-- End Single Nav link-->
                                
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                    <a href="#" class="header__nav-link">KHO<i class="icon-chevron-down"></i></a>
                                    <!-- Megamenu Menu-->
                                    <ul class="mega-menu pos-absolute">
                                        <li class="mega-menu__box">
                                            <!--Single Megamenu Item Menu-->
                                            <div class="mega-menu__item-box">
                                                <ul class="mega-menu__item">
                                                    <li class="mega-menu__list"><a href="chiTietHang.html" class="mega-menu__link">Kho Cầu Giấy</a></li>
                                                    <li class="mega-menu__list"><a href="shop-4-grid.html" class="mega-menu__link">Kho Hà Đông</a></li>
                                                    <li class="mega-menu__list"><a href="shop-5-grid.html" class="mega-menu__link">Kho Bắc Từ Liêm</a></li>
                                                </ul>
                                            </div>
                                            <!--Single Megamenu Item Menu-->
    
                                            <!--Single Megamenu Item Menu-->
                                            <div class="mega-menu__item-box">
                                                <ul class="mega-menu__item">                                                    
                                                    <li class="mega-menu__list"><a href="chiTietHang.html" class="mega-menu__link">Kho Cầu Giấy</a></li>
                                                    <li class="mega-menu__list"><a href="shop-4-grid.html" class="mega-menu__link">Kho Hà Đông</a></li>
                                                    <li class="mega-menu__list"><a href="shop-5-grid.html" class="mega-menu__link">Kho Bắc Từ Liêm</a></li></ul>
                                            </div>
                                            <!--Single Megamenu Item Menu-->
    
                                            <!--Single Megamenu Item Menu-->
                                            <div class="mega-menu__item-box">
                                                <ul class="mega-menu__item">                                                    
                                                    <li class="mega-menu__list"><a href="chiTietHang.html" class="mega-menu__link">Kho Cầu Giấy</a></li>
                                                    <li class="mega-menu__list"><a href="shop-4-grid.html" class="mega-menu__link">Kho Hà Đông</a></li>
                                                    <li class="mega-menu__list"><a href="shop-5-grid.html" class="mega-menu__link">Kho Bắc Từ Liêm</a></li></ul>
                                            </div>
                                            <!--Single Megamenu Item Menu-->
    
                                            <!--Single Megamenu Item Menu-->
                                            <div class="mega-menu__item-box">
                                                <ul class="mega-menu__item">                                                    
                                                    <li class="mega-menu__list"><a href="chiTietHang.html" class="mega-menu__link">Kho Cầu Giấy</a></li>
                                                    <li class="mega-menu__list"><a href="shop-4-grid.html" class="mega-menu__link">Kho Hà Đông</a></li>
                                                    <li class="mega-menu__list"><a href="shop-5-grid.html" class="mega-menu__link">Kho Bắc Từ Liêm</a></li></ul>
                                            </div>
                                            <!--Single Megamenu Item Menu-->
                                        </li>
                                        <!--Megamenu Item Banner-->
                                        <li class="mega-menu__banner">
                                            <a href="chiTietHang.html" class="mega-menu__banner-link">
                                                <img src="assets/clients/img/banner/menu-banner.jpg" alt="" class="mega-menu__banner-img">
                                            </a>
                                        </li>
                                        <!--Megamenu Item Banner-->
                                    </ul>
                                    <!-- Megamenu Menu-->
                                </li> <!-- Start Single Nav link-->
                                
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                    <a class="dropdown-toggle header__nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                                        DANH MỤC SẢN PHẨM
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @foreach ($cats as $cat)
                                            <a class="dropdown-item" href="{{route('listProduct',['id'=>$cat->id])}}">{{$cat->name}}</a>
                                        @endforeach
                                    </div>                           
                                </li> <!-- End Single Nav link-->
    
                                <!--Start Single Nav link-->
                                <li class="header__nav-item pos-relative">
                                        <a href="{{route('contact')}}" class="header__nav-link">LIÊN HỆ</a>
                                </li> <!-- End Single Nav link-->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div> <!-- End Header Menu Area -->
    
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
        </div> <!-- ::::::  Start Mobile Header Section  ::::::  -->
    
        <!-- ::::::  Start Mobile-offcanvas Menu Section  ::::::  -->
        {{-- <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
            <button class="offcanvas__close offcanvas-close">&times;</button>
            <div class="offcanvas-inner">
                <div class="offcanvas-userpanel m-b-30">
                    <ul>
                        <li class="offcanvas-userpanel__role">
                            <a href="{{route('login')}}">Đăng nhập</a>
                            <ul class="expand-dropdown-menu dropdown-menu" >
                                <li><a href="{{route('contact')}}">Tài khoản của tôi</a></li>
                                <li><a href="wishlist.html">My wishlist</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="{{route('login')}}">Sign in</a></li>
                            </ul>
                        </li>
                        <li class="offcanvas-userpanel__role">
                            <a href="#">USD $</a>
                            <ul class="user-sub-menu">
                                <li><a href="#">VND</a></li>
                                <li><a href="#">USD</a></li>
                            </ul>
                        </li>
                        <li class="offcanvas-userpanel__role">
                            <a href="#"><img src="assets/clients/img/icon/flag/icon_usa.png" alt="">English </a>
                            <ul class="user-sub-menu">
                                <li><a href="#"><img src="assets/clients/img/icon/flag/icon_usa.png" alt="">English</a></li>
                                <li><a href="#"><img src="assets/clients/img/icon/flag/icon_france.png" alt=""> Tiếng Việt</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                
                <div class="offcanvas-menu m-b-30">
                    <a href="#" class="header__nav-link">KHO<i class="icon-chevron-down"></i></a>
                    <!-- Megamenu Menu-->
                    <ul class="mega-menu pos-absolute">
                        <li class="mega-menu__box">
                            <!--Single Megamenu Item Menu-->
                            <div class="mega-menu__item-box">
                                <ul class="mega-menu__item">
                                    <li class="mega-menu__list"><a href="chiTietHang.html" class="mega-menu__link">Kho Cầu Giấy</a></li>
                                    <li class="mega-menu__list"><a href="shop-4-grid.html" class="mega-menu__link">Kho Hà Đông</a></li>
                                    <li class="mega-menu__list"><a href="shop-5-grid.html" class="mega-menu__link">Kho Bắc Từ Liêm</a></li>
                                </ul>
                            </div>
                            <!--Single Megamenu Item Menu-->
    
                            <!--Single Megamenu Item Menu-->
                            <div class="mega-menu__item-box">
                                <ul class="mega-menu__item">                                                    
                                    <li class="mega-menu__list"><a href="chiTietHang.html" class="mega-menu__link">Kho Cầu Giấy</a></li>
                                    <li class="mega-menu__list"><a href="shop-4-grid.html" class="mega-menu__link">Kho Hà Đông</a></li>
                                    <li class="mega-menu__list"><a href="shop-5-grid.html" class="mega-menu__link">Kho Bắc Từ Liêm</a></li></ul>
                            </div>
                            <!--Single Megamenu Item Menu-->
    
                            <!--Single Megamenu Item Menu-->
                            <div class="mega-menu__item-box">
                                <ul class="mega-menu__item">                                                    
                                    <li class="mega-menu__list"><a href="chiTietHang.html" class="mega-menu__link">Kho Cầu Giấy</a></li>
                                    <li class="mega-menu__list"><a href="shop-4-grid.html" class="mega-menu__link">Kho Hà Đông</a></li>
                                    <li class="mega-menu__list"><a href="shop-5-grid.html" class="mega-menu__link">Kho Bắc Từ Liêm</a></li></ul>
                            </div>
                            <!--Single Megamenu Item Menu-->
    
                            <!--Single Megamenu Item Menu-->
                            <div class="mega-menu__item-box">
                                <ul class="mega-menu__item">                                                    
                                    <li class="mega-menu__list"><a href="chiTietHang.html" class="mega-menu__link">Kho Cầu Giấy</a></li>
                                    <li class="mega-menu__list"><a href="shop-4-grid.html" class="mega-menu__link">Kho Hà Đông</a></li>
                                    <li class="mega-menu__list"><a href="shop-5-grid.html" class="mega-menu__link">Kho Bắc Từ Liêm</a></li></ul>
                            </div>
                            <!--Single Megamenu Item Menu-->
                        </li>
                        <!--Megamenu Item Banner-->
                        <li class="mega-menu__banner">
                            <a href="chiTietHang.html" class="mega-menu__banner-link">
                                <img src="assets/clients/img/banner/menu-banner.jpg" alt="" class="mega-menu__banner-img">
                            </a>
                        </li>
                        <!--Megamenu Item Banner-->
                    </ul>
                    <!-- Megamenu Menu-->
                </div>
                <div class="offcanvas-buttons m-b-30">
                    <a href="my-account.html" class="user"><i class="icon-user"></i></a>
                    <a href="wishlist.html"><i class="icon-heart"></i></a>
                    <a href="cart.html"><i class="icon-shopping-cart"></i></a>
                </div>
                <div class="offcanvas-social">
                    <span>Stay With Us</span>
                    <ul>
                        <li>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> <!-- ::::::  End Mobile-offcanvas Menu Section  ::::::  --> --}}
    
        <div class="offcanvas-overlay"></div>
    </header>
    <!-- ::::::  End  Header Section  ::::::  -->      
    
    <!-- ::::::  Start  Main Container Section  ::::::  -->
   <div class="content">
    @yield('content')
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
                                <a href="{{route('home')}}" class="footer__logo-link">
                                    <img src="assets/clients/img/logo/logo.jpg" alt="" class="footer__logo-img">
                                </a>
                            </div>
                            <div class="footer__text">
                                <p>We are a team of designers & developers that create high quality Magento, Prestashop, Opencart.</p>
                            </div>
                            <ul class="footer__address">
                                <li class="footer__address-item"><span>Địa chỉ:</span> The Barn, Ullenhall, Henley in Arden B578 5C, England.</li>
                                <li class="footer__address-item"><span>SĐT: </span> <a href="tel:+(012)-800-456-789-987">+(012) 800 456 789 - 987</a> </li>
                                <li class="footer__address-item"><span>Email: </span> <a href="mailto:tagiang2001thi@gmail.com">tagiang2001thi@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="footer__menu">
                            <h4 class="footer__nav-title">Sản Phẩm</h4>
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
                            <h4 class="footer__nav-title">Công ty của chúng tôi</h4>
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
                                    <h4 class="footer__nav-title">Theo dõi chúng tôi</h4>
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
                                    <h4 class="footer__nav-title">Nhận thông tin mới nhất</h4>
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

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugin/plugins.min.js"></script> -->

    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{asset('assets/clients/js/main.js')}}"></script>
</body>

</html>