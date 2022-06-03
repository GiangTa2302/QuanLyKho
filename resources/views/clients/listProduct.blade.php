<main id="main-container" class="main-container m-5">
    <div class="row">
        <div class="col-12">
            <div class="swiper-outside-arrow-fix pos-relative">
                <div class="product-default-slider-5grid overflow-hidden  m-t-50">
                    <div class="swiper-wrapper">
                        <!-- Start Single Default Product -->
                        @foreach ($pros as $pro)
                        <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                            <div class="product__img-box">
                                <a href="{{route('detailProduct',['id'=>$pro->id])}}" class="product__img--link">
                                    <img class="product__img" src="{{asset('storage/products/'.$pro->image)}}" alt="">
                                </a>
                                <a href="{{route('user.addcart',['id'=>$pro->id])}}" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">
                                    Thêm vào giỏ hàng
                                </a>
                                <span class="product__tag product__tag--discount">
                                    @php
                                        $discount = ($pro->regular_price - $pro->sale_price)/$pro->regular_price * 100;
                                        echo number_format($discount,2)."%";
                                    @endphp
                                </span>
                            </div>
                            <div class="product__price m-t-10">
                                <span class="product__price-del">{{$pro->regular_price}}₫</span>
                                <span class="product__price-reg">{{$pro->sale_price}}₫</span>
                            </div>
                            <a href="{{route('detailProduct',['id'=>$pro->id])}}" class="product__link product__link--underline product__link--weight-light m-t-15">
                                {{$pro->tenSP}}
                            </a>
                        </div>
                        @endforeach
                        <!-- End Single Default Product -->
                    </div>
                    <div class="swiper-buttons">
                        <!-- Add Arrows -->
                        <div class="swiper-button-next default__nav default__nav--next"><i class="fal fa-chevron-right"></i></div>
                        <div class="swiper-button-prev default__nav default__nav--prev"><i class="fal fa-chevron-left"></i></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>