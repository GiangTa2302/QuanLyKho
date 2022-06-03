<main id="main-container" class="main-container">
    <div class="container mt-5 mb-5">
        
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
                                    <input type="text" id="form-first-name" name="name">
                                    <input type="hidden" name='typeOrder' value="xuat">
                                </div>
                            </div>
                            @else
                            <div class="col-md-12">
                                <div class="form-box__single-group">
                                    <label for="form-first-name">Tên công ty</label>
                                    <input type="text" id="form-first-name" name="name">
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
                                    <input type="text" id="form-state-1" name="city" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-state">Quận/Huyện<span style="color: red;">*</span></label>
                                    <input type="text" id="form-state-1" name="province" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-box__single-group">
                                    <label for="form-address-1">Địa chỉ nhà<span style="color: red;">*</span></label>
                                    <input type="text" id="form-address-1" name="address" required>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-zipcode">Zip/Postal Code</label>
                                    <input type="text" id="form-zipcode" name="zipcode">
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-phone">Số điện thoại</label>
                                    <input type="text" id="form-phone" name="phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-email">Email</label>
                                    <input type="email" id="form-email" name="email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-box__single-group">
                                    <h6>Ghi chú đơn hàng</h6>
                                    <textarea  id="form-additional-info" rows="5" name="note"></textarea>
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
                            <div class="your-order-product-info">
                                <div class="your-order-top d-flex justify-content-between">
                                    <h6 class="your-order-top-left">Danh sách sản phẩm</h6>
                                    <h6 class="your-order-top-right">Tổng</h6>
                                </div>
                                <ul class="your-order-middle">
                                    @if (session('cart'))
                                        @foreach ( session('cart') as $id => $details )
                                        <li class="d-flex justify-content-between">
                                            <span class="your-order-middle-left">{{$details['name']}} X {{$details['qty']}}</span>
                                            <span class="your-order-middle-right">
                                                @php
                                                    echo $details['price']*$details['qty'];
                                                @endphp
                                            </span>
                                        </li>
                                        @endforeach
                                    @endif
                                </ul>
                                <div class="your-order-bottom d-flex justify-content-between">
                                    <h6 class="your-order-bottom-left">Phí vận chuyển</h6>
                                    <span class="your-order-bottom-right">Free shipping</span>
                                </div>
                                <div class="your-order-total d-flex justify-content-between">
                                    <h5 class="your-order-total-left">Tổng tiền hàng</h5>
                                    <h5 class="your-order-total-right">
                                        {{-- @if (session('cart'))
                                            @php
                                                $len = count(session('cart'));
                                                for($i = 0; $i < $len; $i++)
                                                $total += $details['price']*$details['qty'];
                                            @endphp
                                        @endif   --}}
                                    </h5>
                                </div>

                                {{-- <div class="payment-method">
                                    <div class="payment-accordion element-mrg">
                                        <div class="panel-group" id="accordion">
                                            <div class="panel payment-accordion">
                                                <div class="panel-heading" id="method-one">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#method1" aria-expanded="false" class="collapsed">
                                                            Direct bank transfer
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="method1" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel payment-accordion">
                                                <div class="panel-heading" id="method-two">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#method2" aria-expanded="false">
                                                            Check payments
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="method2" class="panel-collapse collapse" >
                                                    <div class="panel-body">
                                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel payment-accordion">
                                                <div class="panel-heading" id="method-three">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#method3" aria-expanded="false">
                                                            Cash on delivery
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="method3" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>

                        <button class="btn btn--block btn--small btn--blue btn--uppercase btn--weight" type="submit">ĐẶT HÀNG</button>
                    </div>
                </div> <!-- End Order Wrapper -->
            </div>
        </form> 
        
    </div>
</main>