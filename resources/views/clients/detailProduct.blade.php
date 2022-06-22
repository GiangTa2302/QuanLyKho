<main id="main-container" class="main-container">
        <div class="container mt-5 mb-5">
            <div class="row">
                <!-- Start Product Details Gallery -->
                <div class="col-12">
                    <div class="product-details">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery-box m-b-60">
                                    <div class="product-image--large overflow-hidden">
                                        <img class="img-fluid" id="img-zoom" src="{{asset('storage/products/'.$pro->image)}}" data-zoom-image="{{asset('storage/products/'.$pro->image)}}" alt="" width="300" height="700">
                                    </div>
                                    <div class="pos-relative m-t-30">
                                        <div id="gallery-zoom" class="product-image--thumb product-image--thumb-horizontal overflow-hidden swiper-outside-arrow-hover m-lr-30">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <a class="zoom-active" data-image="{{asset('storage/products/'.$pro->image)}}" data-zoom-image="{{asset('storage/products/'.$pro->image)}}">
                                                        <img class="img-fluid" src="{{asset('storage/products/'.$pro->image)}}" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-buttons">
                                            <!-- Add Arrows -->
                                            <div class="swiper-button-next gallery__nav gallery__nav--next"><i class="fal fa-chevron-right"></i></div>
                                            <div class="swiper-button-prev gallery__nav gallery__nav--prev"><i class="fal fa-chevron-left"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-details-box">
                                    <h5 class="section-content__title">{{$pro->tenSP}}</h5>
                                    <span class="text-reference">Nhà cung cấp: {{$cat->name}}</span>
                                    <div class="review-box">
                                        <ul class="product__review m-t-10 m-b-15">
                                            <li class="product__review--fill"><i class="icon-star"></i></li>
                                            <li class="product__review--fill"><i class="icon-star"></i></li>
                                            <li class="product__review--fill"><i class="icon-star"></i></li>
                                            <li class="product__review--fill"><i class="icon-star"></i></li>
                                            <li class="product__review--blank"><i class="icon-star"></i></li>
                                        </ul>
                                        <a href="#product-review" class="link--gray link--icon-left  m-b-5"><i class="fal fa-comment-dots"></i>Đọc đánh giá (1) </a>
                                        <a href="#modalReview" data-toggle="modal" class="link--gray link--icon-left m-b-5"><i class="fal fa-edit"></i> Viết đánh giá</a>
                                    </div>
                                    @if(Route::has('login'))
                                    @auth
                                    @if(Auth::user()->is_admin == 0)
                                        <div class="product__price">
                                            <span class="product__price-reg">{{$pro->giaXuat}}</span>
                                        </div>
                                        <div class="product__desc m-t-25 m-b-30">
                                            <p>{{$pro->description}}</p>
                                        </div>
                                        <div class="product-var p-t-30">
                                            <div class="product-color product-var__item">
                                                <span class="product-var__text">Màu sắc: {{$pro->mauSac}}</span>
                                            </div>
                                            <div class="product-quantity product-var__item">
                                                <span class="product-var__text">Số lượng</span>
                                                <div class="product-quantity-box">
                                                    <div class="quantity">
                                                        <input type="number" min="1" max="9" step="1" value="1">
                                                    </div>
                                                    @if($pro->quantity > 0)
                                                        <a href="{{route('user.addcart',['id'=>$pro->id, 'role'=>Auth::user()->is_admin])}}" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-l-20" >
                                                            Thêm vào giỏ hàng
                                                        </a>
                                                        <a href="{{route('user.checkout')}}" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-l-20" >
                                                            Mua ngay
                                                        </a>
                                                    @else
                                                        <a href="" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-l-20" >
                                                            Hết hàng
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @elseif(Auth::user()->is_admin == 2)
                                        <div class="product__price">
                                            <span class="product__price-reg">{{$pro->giaNhap}}</span>
                                        </div>
                                        <div class="product__desc m-t-25 m-b-30">
                                            <p>{{$pro->description}}</p>
                                        </div>
                                        <div class="product-var p-t-30">
                                            <div class="product-color product-var__item">
                                                <span class="product-var__text">Màu sắc: {{$pro->mauSac}}</span>
                                            </div>
                                            <div class="product-quantity product-var__item">
                                                <span class="product-var__text">Số lượng</span>
                                                <div class="product-quantity-box">
                                                    <div class="quantity">
                                                        <input type="number" min="1" max="9" step="1" value="1">
                                                    </div>
                                                    <a href="{{route('user.addcart',['id'=>$pro->id, 'role'=>Auth::user()->is_admin])}}" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-l-20" >
                                                    Thêm vào giỏ hàng
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @else
                                        <div class="product__price">
                                            <span class="product__price-reg">{{$pro->giaNhap}}</span>
                                        </div>
                                        <div class="product__desc m-t-25 m-b-30">
                                            <p>{{$pro->description}}</p>
                                        </div>
                                        <div class="product-var p-t-30">
                                            <div class="product-color product-var__item">
                                                <span class="product-var__text">Màu sắc: {{$pro->mauSac}}</span>
                                            </div>
                                            <div class="product-quantity product-var__item">
                                                <span class="product-var__text">Số lượng</span>
                                                <div class="product-quantity-box">
                                                    <div class="quantity">
                                                        <input type="number" min="1" max="9" step="1" value="1">
                                                    </div>
                                                    <a href="{{route('login')}}" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-l-20" >
                                                    Thêm vào giỏ hàng
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                    <div class="product-links ">
                                        <div class="product-social m-tb-30">
                                            <span>Chia sẻ</span>
                                            <ul class="product-social-link">
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div><!-- End Product Details Gallery -->
                
                <!-- Start Product Details Tab -->
                <div class="col-12">
                    <div class="product product--1 border-around product-details-tab-area">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-content--border">
                                    <ul class="tablist tablist--style-black tablist--style-title tablist--style-gap-70 nav">
                                        <li><a class="nav-link active" data-toggle="tab" href="#product-desc">Mô tả sản phẩm</a></li>
                                        <li><a class="nav-link" data-toggle="tab" href="#product-review">Đánh giá</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12">
                            <div class="product-details-tab-box m-t-50">
                                <div class="tab-content">
                                    <!-- Start Tab - Product Description -->
                                    <div class="tab-pane show active" id="product-desc">
                                        <div class="para__content">
                                            <p>{{$pro->description}}</p>
                                        </div>    
                                    </div>  <!-- End Tab - Product Description -->
                                     <!-- Start Tab - Product Review -->
                                    <div class="tab-pane " id="product-review">
                                        <!-- Start - Review Comment -->
                                        <ul class="comment">
                                            <!-- Start - Review Comment list-->
                                            <li class="comment__list">
                                                <div class="comment__wrapper">
                                                    <div class="comment__img">
                                                        <img src="assets/img/user/image-1.png" alt=""> 
                                                    </div>
                                                    <div class="comment__content">
                                                        <div class="comment__content-top">
                                                            <div class="comment__content-left">
                                                                <h6 class="comment__name">Kaedyn Fraser</h6>
                                                                <ul class="product__review">
                                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                                    <li class="product__review--blank"><i class="icon-star"></i></li>
                                                                </ul>
                                                            </div>   
                                                            <div class="comment__content-right">
                                                                <a href="#" class="link--gray link--icon-left m-b-5"><i class="fas fa-reply"></i>Reply</a>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="para__content">
                                                            <p class="para__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora inventore dolorem a unde modi iste odio amet, fugit fuga aliquam, voluptatem maiores animi dolor nulla magnam ea! Dignissimos aspernatur cumque nam quod sint provident modi alias culpa, inventore deserunt accusantium amet earum soluta consequatur quasi eum eius laboriosam, maiores praesentium explicabo enim dolores quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam officia, saepe repellat. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Start - Review Comment Reply-->
                                                <ul class="comment__reply">
                                                    <li class="comment__reply-list">
                                                        <div class="comment__wrapper">
                                                            <div class="comment__img">
                                                                <img src="assets/img/user/image-2.png" alt=""> 
                                                            </div>
                                                            <div class="comment__content">
                                                                <div class="comment__content-top">
                                                                    <div class="comment__content-left">
                                                                        <h6 class="comment__name">Oaklee Odom</h6>
                                                                    </div>   
                                                                    <div class="comment__content-right">
                                                                        <a href="#" class="link--gray link--icon-left m-b-5"><i class="fas fa-reply"></i>Reply</a>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="para__content">
                                                                    <p class="para__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora inventore dolorem a unde modi iste odio amet, fugit fuga aliquam, voluptatem maiores animi dolor nulla magnam ea! Dignissimos aspernatur cumque nam quod sint provident modi alias culpa, inventore deserunt accusantium amet earum soluta consequatur quasi eum eius laboriosam, maiores praesentium explicabo enim dolores quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam officia, saepe repellat. </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul> <!-- End - Review Comment Reply-->
                                            </li> <!-- End - Review Comment list-->
                                            <!-- Start - Review Comment list-->
                                            <li class="comment__list">
                                                <div class="comment__wrapper">
                                                    <div class="comment__img">
                                                        <img src="assets/img/user/image-3.png" alt=""> 
                                                    </div>
                                                    <div class="comment__content">
                                                        <div class="comment__content-top">
                                                            <div class="comment__content-left">
                                                                <h6 class="comment__name">Jaydin Jones</h6>
                                                                <ul class="product__review">
                                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                                    <li class="product__review--fill"><i class="icon-star"></i></li>
                                                                    <li class="product__review--blank"><i class="icon-star"></i></li>
                                                                </ul>
                                                            </div>   
                                                            <div class="comment__content-right">
                                                                <a href="#" class="link--gray link--icon-left m-b-5"><i class="fas fa-reply"></i>Reply</a>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="para__content">
                                                            <p class="para__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora inventore dolorem a unde modi iste odio amet, fugit fuga aliquam, voluptatem maiores animi dolor nulla magnam ea! Dignissimos aspernatur cumque nam quod sint provident modi alias culpa, inventore deserunt accusantium amet earum soluta consequatur quasi eum eius laboriosam, maiores praesentium explicabo enim dolores quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam officia, saepe repellat. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li> <!-- End - Review Comment list-->
                                        </ul>  <!-- End - Review Comment -->

                                        <a href="#modalReview" data-toggle="modal" class="btn btn--box btn--small btn--blue btn--uppercase btn--weight m-t-30">Write a review</a>
                                    </div>  <!-- Start Tab - Product Review -->
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>  <!-- End Product Details Tab -->

                <div class="col-12">
                    <div class="product product--1 swiper-outside-arrow-hover">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-content section-content--border d-flex align-items-center justify-content-between">
                                    <h5 class="section-content__title">Các sản phẩm khác: </h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="swiper-outside-arrow-fix pos-relative">
                                    <div class="product-default-slider-5grid overflow-hidden  m-t-50">
                                        <div class="swiper-wrapper">
                                            @if(Route::has('login'))
                                            @auth
                                                    @if(Auth::user()->is_admin == 0)
                                                        @foreach ($products as $prod)
                                                            @if ($prod->category_id == $pro->category_id)
                                                                <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                                    <div class="product__img-box">
                                                                        <a href="{{route('detailProduct',['id'=>$prod->id])}}" class="product__img--link">
                                                                            <img class="product__img" src="{{asset('storage/products/'.$prod->image)}}" alt="" height="200">
                                                                        </a>
                                                                        @if($prod->quantity == 0)
                                                                        <a href="" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn" >
                                                                            Hết hàng
                                                                        </a>
                                                                        @else
                                                                        <a href="{{route('user.addcart',['id'=>$prod->id, 'role'=>Auth::user()->is_admin])}}" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">
                                                                            Thêm vào giỏ hàng
                                                                        </a>
                                                                        @endif
                                                                        <span class="product__tag product__tag--discount" style="font-size: 8px;">
                                                                            @php
                                                                                echo date('m/Y', strtotime($prod->tgBaoQuan));
                                                                            @endphp
                                                                        </span>
                                                                    </div>
                                                                    <div class="product__price m-t-10">
                                                                        <span class="product__price-reg">{{$prod->giaXuat}}₫</span>
                                                                    </div>
                                                                    <a href="{{route('detailProduct',['id'=>$prod->id])}}" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                                        {{$prod->tenSP}}
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        @foreach ($products as $prod)
                                                            @if ($prod->category_id == $pro->category_id)
                                                                <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                                    <div class="product__img-box">
                                                                        <a href="{{route('detailProduct',['id'=>$prod->id])}}" class="product__img--link">
                                                                            <img class="product__img" src="{{asset('storage/products/'.$prod->image)}}" alt="" height="200">
                                                                        </a>
                                                                        <a href="{{route('user.addcart',['id'=>$prod->id, 'role'=>Auth::user()->is_admin])}}" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">
                                                                            Thêm vào giỏ hàng
                                                                        </a>
                                                                        <span class="product__tag product__tag--discount" style="font-size: 8px;">
                                                                            @php
                                                                                echo date('m/Y', strtotime($prod->tgBaoQuan));
                                                                            @endphp
                                                                        </span>
                                                                    </div>
                                                                    <div class="product__price m-t-10">
                                                                        <span class="product__price-reg">{{$prod->giaNhap}}₫</span>
                                                                    </div>
                                                                    <a href="{{route('detailProduct',['id'=>$prod->id])}}" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                                        {{$prod->tenSP}}
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                            @else
                                                @foreach ($products as $prod)
                                                    @if ($prod->category_id == $pro->category_id)
                                                        <div class="product__box product__box--default product__box--border-hover swiper-slide text-center">
                                                            <div class="product__img-box">
                                                                <a href="{{route('detailProduct',['id'=>$prod->id])}}" class="product__img--link">
                                                                    <img class="product__img" src="{{asset('storage/products/'.$prod->image)}}" alt="" height="200">
                                                                </a>
                                                                <a href="{{route('login')}}" class="btn btn--box btn--small btn--gray btn--uppercase btn--weight btn--hover-zoom product__upper-btn">
                                                                    Thêm vào giỏ hàng
                                                                </a>
                                                                <span class="product__tag product__tag--discount" style="font-size: 8px;">
                                                                    @php
                                                                        echo date('m/Y', strtotime($prod->tgBaoQuan));
                                                                    @endphp
                                                                </span>
                                                            </div>
                                                            <div class="product__price m-t-10">
                                                                <span class="product__price-reg">{{$prod->giaXuat}}₫</span>
                                                            </div>
                                                            <a href="{{route('detailProduct',['id'=>$prod->id])}}" class="product__link product__link--underline product__link--weight-light m-t-15">
                                                                {{$prod->tenSP}}
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                @endif
                                            @endif
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
                    </div> <!-- ::::::  End  Product Style - Default Section  ::::::  -->
                </div>
            </div>
        </div>
    </main>