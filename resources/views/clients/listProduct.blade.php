<main id="main-container" class="main-container m-5">
    <div class="row">
        <div class="col-12">
            <div class="swiper-outside-arrow-fix pos-relative">
                <div class="product-default-slider-5grid overflow-hidden  m-t-50">
                    <div class="swiper-wrapper">
                        <!-- Start Single Default Product -->
                        @foreach ($pros as $pro)
                        @if(Route::has('login'))
                            @auth
                                @if(Auth::user()->is_admin == 0)
                                    <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                        <div class="product__img-box">
                                            <a href="{{route('detailProduct',['id'=>$pro->id])}}" class="product__img--link">
                                                <img class="product__img" src="{{asset('storage/products/'.$pro->image)}}" alt="" height="200">
                                            </a>
                                            @if($pro->quantity == 0)
                                            <a href="" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn" >
                                                Hết hàng
                                            </a>
                                            @else
                                            <a href="{{route('user.addcart',['id'=>$pro->id, 'role'=> Auth::user()->is_admin])}}" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">
                                                Thêm vào giỏ hàng
                                            </a>
                                            @endif
                                            <span class="product__tag product__tag--discount" style="font-size: 8px;">
                                                @php
                                                    echo date('m/Y', strtotime($pro->tgBaoQuan));
                                                @endphp
                                            </span>
                                        </div>
                                        <div class="product__price m-t-10">
                                            <span class="product__price-reg">{{$pro->giaXuat}}₫</span>
                                        </div>
                                        <a href="{{route('detailProduct',['id'=>$pro->id])}}" class="product__link product__link--underline product__link--weight-light m-t-15">
                                            {{$pro->tenSP}}
                                        </a>
                                    </div>
                                @elseif(Auth::user()->is_admin == 2)
                                    <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                        <div class="product__img-box">
                                            <a href="{{route('detailProduct',['id'=>$pro->id])}}" class="product__img--link">
                                                <img class="product__img" src="{{asset('storage/products/'.$pro->image)}}" alt="" height="200">
                                            </a>
                                            <a href="{{route('user.addcart',['id'=>$pro->id, 'role' => Auth::user()->is_admin])}}" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">
                                                Thêm vào giỏ hàng
                                            </a>
                                            <span class="product__tag product__tag--discount" style="font-size: 8px;">
                                                @php
                                                    echo date('m/Y', strtotime($pro->tgBaoQuan));
                                                @endphp
                                            </span>
                                        </div>
                                        <div class="product__price m-t-10">
                                            {{-- <span class="product__price-del">0₫</span> --}}
                                            <span class="product__price-reg">{{$pro->giaNhap}}₫</span>
                                        </div>
                                        <a href="{{route('detailProduct',['id'=>$pro->id])}}" class="product__link product__link--underline product__link--weight-light m-t-15">
                                            {{$pro->tenSP}}
                                        </a>
                                    </div>
                                    @endif
                                    @else
                                        <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                            <div class="product__img-box">
                                                <a href="{{route('detailProduct',['id'=>$pro->id])}}" class="product__img--link">
                                                    <img class="product__img" src="{{asset('storage/products/'.$pro->image)}}" alt="" height="200">
                                                </a>
                                                <a  href="{{route('login')}}" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">
                                                    Thêm vào giỏ hàng
                                                </a>
                                                <span class="product__tag product__tag--discount" style="font-size: 8px;">
                                                    @php
                                                        echo date('m/Y', strtotime($pro->tgBaoQuan));
                                                    @endphp
                                                </span>
                                            </div>
                                            <div class="product__price m-t-10">
                                                {{-- <span class="product__price-del">0₫</span> --}}
                                                <span class="product__price-reg">{{$pro->giaNhap}}₫</span>
                                            </div>
                                            <a href="{{route('detailProduct',['id'=>$pro->id])}}" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                {{$pro->tenSP}}
                                            </a>
                                        </div>
                                @endif
                                @endif
                        @endforeach
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