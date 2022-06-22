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
                                                        {{Auth::user()->name}}
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
                            <form class="header__search-form" action="" method="POST">
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
                                <p>Chúng tôi là một nhóm các nhà thiết kế & phát triển tạo ra Magento, Prestashop, Opencart chất lượng cao.</p>
                            </div>
                            <ul class="footer__address">
                                <li class="footer__address-item"><span>Địa chỉ:</span> Tây Lai Xá, Kim Chung, Hoài Đức, Hà Nội.</li>
                                <li class="footer__address-item"><span>SĐT: </span> <a href="tel:+(012)-800-456-789-987">+(012) 800 456 789 - 987</a> </li>
                                <li class="footer__address-item"><span>Email: </span> <a href="mailto:tagiang2001thi@gmail.com">tagiang2001thi@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="footer__menu">
                            <h4 class="footer__nav-title">Sản Phẩm</h4>
                            <ul class="footer__nav">
                                <li class="footer__list"><a href="" class="footer__link">Giảm giá</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Sản phẩm mới</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Bán chạy nhất</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Liên hệ</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Bản đồ</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Đăng nhập</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="footer__menu">
                            <h4 class="footer__nav-title">Công ty của chúng tôi</h4>
                            <ul class="footer__nav">
                                <li class="footer__list"><a href="" class="footer__link">Vận chuyển</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Thông báo</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Phản hồi</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Thanh toán an toàn</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Bản đồ</a></li>
                                <li class="footer__list"><a href="" class="footer__link">Cửa hàng</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="footer__menu">
                                    <h4 class="footer__nav-title">Theo dõi chúng tôi</h4>
                                    <ul class="footer__social-nav">
                                        <li class="footer__social-list"><a href="https://www.facebook.com/profile.php?id=100049246088557" class="footer__social-link"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-twitter"></i></a></li>
                                        <li class="footer__social-list"><a href="https://www.youtube.com/channel/UC1w6Dnb6guy5671NsHxLxyg" class="footer__social-link"><i class="fab fa-youtube"></i></a></li>
                                        <li class="footer__social-list"><a href="#" class="footer__social-link"><i class="fab fa-google-plus-g"></i></a></li>
                                        <li class="footer__social-list"><a href="https://www.instagram.com/giangta23/" class="footer__social-link"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="footer__form">
                                    <h4 class="footer__nav-title">Nhận thông tin mới nhất</h4>
                                    <form action="#" class="footer__form-box">
                                        <input type="email" placeholder="email">
                                        <button class="btn btn--submit btn--blue btn--uppercase btn--weight " type="submit">Gửi</button>
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