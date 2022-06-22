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
                    {{-- <li class="header__nav-item pos-relative">
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
                    </li> <!-- Start Single Nav link--> --}}
                    
                    <!--Start Single Nav link-->
                    <li class="header__nav-item pos-relative">
                        <a class="dropdown-toggle header__nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                            DANH MỤC SẢN PHẨM
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @if (session('cats'))
                            @foreach (session('cats') as $key => $value)
                                <a class="dropdown-item" href="{{route('listProduct',['id'=>$value->id])}}">{{$value->name}}</a>
                            @endforeach
                            @endif
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