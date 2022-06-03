<main id="main-container" class="main-container">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12">
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif
                <div class="section-content">
                    <h5 class="section-content__title">Giỏ hàng của bạn</h5>
                </div>
                <!-- Start Cart Table -->

                <div class="table-content table-responsive cart-table-content m-t-30">
                    <table>
                        <thead class="gray-bg" >
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (session('cart'))
                                @foreach ( session('cart') as $id => $details )
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="{{route('detailProduct',['id'=>$details['pro_id']])}}"><img class="img-fluid" src="{{asset('storage/products/'.$details['image'])}}" alt=""></a>
                                    </td>
                                    <td class="product-name"><a href="{{route('detailProduct',['id'=>$details['pro_id']])}}">{{$details['name']}}</a></td>
                                    <td class="product-price-cart"><span class="amount">{{$details['price']}}</span></td>
                                    <td class="product-quantities">
                                        <div class="quantity d-inline-block">
                                            <input type="number" min="1" step="1" value="{{$details['qty']}}">
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        @php
                                            echo $details['price']*$details['qty'];
                                        @endphp
                                    </td>
                                    <td class="product-remove">
                                        <a href="{{route('user.delcart',['id'=>$details['pro_id']])}}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr> 
                                @endforeach
                            @else
                            <tr>
                                <td colspan="6">Chưa có sản phẩm nào trong giỏ hàng!</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>  <!-- End Cart Table -->
                 <!-- Start Cart Table Button -->
                <div class="cart-table-button m-t-10">
                    <div class="cart-table-button--left">
                        <a href="{{route('home')}}" class="btn btn--box btn--large btn--gray btn--uppercase btn--weight m-t-20">TIẾP TỤC MUA SẮM</a>
                    </div>
                    <div class="cart-table-button--right">
                        <a href="{{route('user.delcart')}}" class="btn btn--box btn--large btn--blue btn--uppercase btn--weight m-t-20">Xóa giỏ hàng</a>
                    </div>
                    <div class="cart-table-button--right">
                        <a href="{{route('user.checkout')}}" class="btn btn--box btn--large btn--blue btn--uppercase btn--weight m-t-20">Mua hàng</a>
                    </div>
                </div>  <!-- End Cart Table Button -->
            </div>
            
        </div>
        {{-- <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="sidebar__widget gray-bg m-t-40">
                    <div class="sidebar__box">
                        <h5 class="sidebar__title">DỰ TOÁN VẬN CHUYỂN VÀ THUẾ</h5>
                    </div>
                    <span>Nhập địa chỉ của bạn để nhận ước tính vận chuyển.</span>
                    <form action="#" method="post" class="form-box">
                        <div class="form-box__single-group">
                            <label for="form-country">* Tỉnh/Thành Phố</label>
                            <select id="form-country">
                                <option value="BD" selected>Bangladesh</option>
                                <option value="US">USA</option>
                                <option value="UK">UK</option>
                                <option value="TR">Turkey</option>
                                <option value="CA">Canada</option>
                            </select>
                        </div>
                        <div class="form-box__single-group">
                            <label for="form-state">* Quận/Huyện</label>
                            <select id="form-state">
                                <option value="Dha" selected>Dhaka</option>
                                <option value="Kha">Khulna</option>
                                <option value="Raj">Rajshahi</option>
                                <option value="Syl">Sylet</option>
                                <option value="Chi">Chittagong</option>
                            </select>
                        </div>
                        <div class="form-box__single-group">
                            <label for="form-zipcode">* Địa chỉ nhà</label>
                            <input type="text" id="form-zipcode">
                        </div>
                        <div class="from-box__buttons m-t-25">
                            <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit">Nhận báo giá</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="sidebar__widget gray-bg m-t-40">
                    <div class="sidebar__box">
                        <h5 class="sidebar__title">SỬ DỤNG MÃ GIẢM GIÁ</h5>
                    </div>
                    <span>Nhập mã phiếu giảm giá của bạn nếu bạn có.</span>
                    <form action="#" method="post" class="form-box">
                        <div class="form-box__single-group">
                            <label for="form-coupon">*Nhập mã Code</label>
                            <input type="text" id="form-coupon">
                        </div>
                        <div class="from-box__buttons m-t-25">
                            <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit">Áp dụng mã giảm giá</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="sidebar__widget gray-bg m-t-40">
                    <div class="sidebar__box">
                        <h5 class="sidebar__title">Tổng tiền</h5>
                    </div>
                    <h6 class="total-cost">Tổng tiền sản phẩm<span>$260.00</span></h6>
                    <div class="total-shipping">
                        <span>Tổng tiền vận chuyển</span>
                        <ul class="shipping-cost m-t-10">
                            <li>
                                <label for="ship-standard">
                                    <input type="radio" class="shipping-select" name="shipping-cost" value="Standard" id="ship-standard" checked><span>Standard</span>
                                </label>
                                <span class="ship-price">$20.00</span>
                            </li>
                            <li>
                                <label for="ship-express">
                                    <input type="radio" class="shipping-select" name="shipping-cost" value="Express" id="ship-express"><span>Express</span>
                                </label>
                                <span class="ship-price">$30.00</span>
                            </li>
                        </ul>
                    </div>
                    <h4 class="grand-total m-tb-25">Tổng cộng <span>$260.00</span></h4>
                    <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit">THANH TOÁN</button>
                </div>
            </div>
        </div> --}}
    </div>
</main>