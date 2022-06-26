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
                                {{-- <input type="hidden" id="id" name="user_id" value="{{Auth::user()->is_admin}}"> --}}
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="{{route('detailProduct',['id'=>$details['pro_id']])}}"><img class="img-fluid" src="{{asset('storage/products/'.$details['image'])}}" alt=""></a>
                                    </td>
                                    <td class="product-name"><a href="{{route('detailProduct',['id'=>$details['pro_id']])}}">{{$details['name']}}</a></td>
                                    <td class="product-price-cart"><span class="amount">@php
                                        echo number_format($details['price']).'đ';
                                    @endphp</span></td>
                                    <td class="product-quantities">
                                        <div class="row">
                                            <a class="mb-3 col-md-4 btn btn-light btnAdd" href="{{route('user.addQty',['id'=>$details['pro_id'],'role'=>Auth::user()->is_admin])}}">+</a>
                                            <input class="mb-3 col-md-4" name="qty" type="number" value="{{$details['qty']}}" >
                                            <a class="mb-3 col-md-4 btn btn-light btnRemove" href="{{route('user.removeQty',['id'=>$details['pro_id'],'role'=>Auth::user()->is_admin])}}">-</a>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        @php
                                            echo number_format($details['price']*$details['qty']).'đ';
                                        @endphp
                                    </td>
                                    <td class="product-remove">
                                        <a href="{{route('user.delTocart',['id'=>$details['pro_id']])}}"><i class="fa fa-trash"></i></a>
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
                    {{-- <div class="cart-table-button--left">
                        <a href="{{route('home')}}" class="btn btn--box btn--large btn--gray btn--uppercase btn--weight m-t-20">TIẾP TỤC MUA SẮM</a>
                    </div> --}}
                    <div class="cart-table-button--right">
                        <a href="{{route('user.delcart')}}" class="btn btn--box btn--large btn--blue btn--uppercase btn--weight m-t-20">Xóa giỏ hàng</a>
                    </div>
                    <div class="cart-table-button--right">
                        @if(Auth::user()->is_admin == 0)
                        <a onclick="myFunc()" href="{{route('user.checkout')}}" class="btn btn--box btn--large btn--blue btn--uppercase btn--weight m-t-20">MUA HÀNG</a>
                        @elseif (Auth::user()->is_admin == 2)
                        <a onclick="myFunc()" href="{{route('user.checkout')}}" class="btn btn--box btn--large btn--blue btn--uppercase btn--weight m-t-20">CUNG CẤP</a>
                        @endif
                    </div>
                </div>  <!-- End Cart Table Button -->
            </div>
            
        </div>
    </div>
</main>


