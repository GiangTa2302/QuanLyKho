<main id="main-container" class="main-container">
    <div class="container mt-5 mb-5">
        @if(session('stripe_error'))
        <div class="alert alert-danger">
            {{ session('stripe_error') }}
        </div>
        @endif
            <!-- Start Client Shipping Address -->
        <form action="{{url('user/place-order')}}" method="POST" >
            @csrf
            <div class="row">
                <div class="col-lg-7">
                    <div class="section-content">
                        <h5 class="section-content__title">Chi tiết thanh toán</h5>
                    </div>
                    <div class="row">
                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                        @if (Auth::user()->is_admin == 0)
                        <div class="col-md-12">
                            <div class="form-box__single-group">
                                <label for="form-first-name">Họ và tên</label>
                                <input type="text" id="form-first-name" name="fullname" value="{{old('fullname')}}">
                                <input type="hidden" name='typeOrder' value="xuat">
                            </div>
                        </div>
                        @else
                        <div class="col-md-12">
                            <div class="form-box__single-group">
                                <label for="form-first-name">Tên công ty</label>
                                <input type="text" id="form-first-name" name="fullname" value="{{old('fullname')}}">
                                <input type="hidden" name='typeOrder' value="nhap">
                            </div>
                        </div>
                        @endif
                        <div class="col-md-12">
                            <div class="form-box__single-group">
                                <label for="form-country">Quốc gia<span style="color: red;">*</span></label>
                                <select id="form-country" name="country" required>
                                    <option value="VN">Việt Nam</option>
                                    <option value="MY">Mỹ</option>
                                    <option value="TQ">Trung Quốc</option>
                                    <option value="NB">Nhật Bản</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-box__single-group">
                                <label for="form-state">Tỉnh/Thành Phố<span style="color: red;">*</span></label>
                                <input type="text" id="form-state-1" name="city" value="{{old('city')}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-box__single-group">
                                <label for="form-state">Quận/Huyện<span style="color: red;">*</span></label>
                                <input type="text" id="form-state-1" name="province" value="{{old('province')}}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-box__single-group">
                                <label for="form-address-1">Địa chỉ nhà<span style="color: red;">*</span></label>
                                <input type="text" id="form-address-1" name="address" value="{{old('address')}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-box__single-group">
                                <label for="form-phone">Số điện thoại</label>
                                <input type="text" id="form-phone" name="phone" value="{{old('phone')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-box__single-group">
                                <label for="form-email">Email</label>
                                <input type="email" id="form-email" name="email" value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-box__single-group">
                                <h6>Ghi chú đơn hàng</h6>
                                <textarea  id="form-additional-info" rows="5" name="note">{{old('note')}}</textarea>
                            </div>
                        </div>
                    </div>
                    
                </div> <!-- End Client Shipping Address -->
                
                <!-- Start Order Wrapper -->
                <div class="col-lg-5">
                    <div class="your-order-section">
                        <div class="section-content">
                            <h5 class="section-content__title">Đơn hàng của bạn</h5>
                        </div>
                        <div class="your-order-box gray-bg m-t-40 m-b-30">
                            @php
                                $total = 0;
                            @endphp
                            <div class="your-order-product-info">
                                <div class="your-order-top d-flex justify-content-between">
                                    <h6 class="your-order-top-left">Danh sách sản phẩm</h6>
                                    <h6 class="your-order-top-right">Tổng</h6>
                                </div>
                                <ul class="your-order-middle">
                                    @if (session('cart'))
                                        @foreach ( session('cart') as $id => $details )
                                        <li class="d-flex justify-content-between">
                                            <span class="your-order-middle-left">{{$details['name']}} x {{$details['qty']}}</span>
                                            <span class="your-order-middle-right">
                                                @php
                                                    $sum = $details['price']*$details['qty'];
                                                    $total += $sum;
                                                    echo number_format($sum).'đ';
                                                @endphp
                                            </span>
                                        </li>
                                        @endforeach
                                    @endif
                                </ul>
                                <input type="hidden" name="total" value="{{$total}}">
                                <div class="your-order-bottom d-flex justify-content-between">
                                    <h5 class="your-order-total-left">Tổng tiền hàng</h5>
                                    <h5 class="your-order-total-right">
                                        @php
                                            echo number_format($total).'đ';
                                        @endphp
                                    </h5>
                                </div>
                            </div>
                        </div>
                    
                        @if (Auth::user()->is_admin == 0)
                        <div class="section-content">
                            <h5 class="section-content__title">Phương thức thanh toán</h5>
                        </div>
                        <div class="col-md-12">
                            <div class="m-tb-20">
                                <label>
                                    <input type="radio" name="check" class="shipping-account"  id="check-account" value="nh" checked>
                                    <span>Thanh toán khi nhận hàng</span>
                                </label>
                            </div>
                            <div class="m-tb-20">
                                <label>
                                    <input type="radio" name="check" class="creat-account" value="th" id="check-account" @php
                                        echo ($errors->any()) ? 'checked' : ''; 
                                    @endphp>
                                    <span>Thẻ tín dụng/Ghi nợ</span>
                                </label>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="toogle-form open-create-account" style="display: @php
                                    echo ($errors->any()) ? 'block' : 'none'; 
                                @endphp" >
                                    <div class="form-box__single-group">
                                        <input type="text" name="card_number" placeholder="Số thẻ" value="{{old('card_number')}}">
                                    </div>
                                    <div class="form-box__single-group">
                                        <input type="text" name="expiry_month" placeholder="MM" value="{{old('expiry_month')}}">
                                    </div>
                                    <div class="form-box__single-group">
                                        <input type="text" name="expiry_year" placeholder="YY" value="{{old('expiry_year')}}">
                                    </div>
                                    <div class="form-box__single-group">
                                        <input type="password" name="cvv" placeholder="Mã CVV" value="{{old('cvv')}}">
                                    </div>
                                    <div class="form-box__single-group">
                                        <input type="text" name="name" placeholder="Họ và tên chủ thẻ" value="{{old('name')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <button class="btn btn--block btn--small btn--blue btn--uppercase btn--weight" type="submit">ĐẶT HÀNG</button>
                    </div>
                </div> 
                <!-- End Order Wrapper -->
            </div>
        </form> 
        
    </div>
</main>