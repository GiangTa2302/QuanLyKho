<main id="main-container" class="main-container">
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-12">
                    <!-- :::::::::: Start My Account Section :::::::::: -->
                    <div class="my-account-area">
                        <div class="row">
                            <div class="col-xl-3 col-md-4">
                                <div class="my-account-menu">
                                    <ul class="nav account-menu-list flex-column nav-pills" id="pills-tab" role="tablist">
                                        <li>
                                            <a class="active link--icon-left" id="pills-dashboard-tab" data-toggle="pill" href="#pills-dashboard"
                                                role="tab" aria-controls="pills-dashboard" aria-selected="true"><i
                                                    class="fas fa-tachometer-alt"></i> Tổng quan</a>
                                        </li>
                                        <li>
                                            <a id="pills-order-tab" class="link--icon-left" data-toggle="pill" href="#pills-order" role="tab"
                                                aria-controls="pills-order" aria-selected="false"><i
                                                    class="fas fa-shopping-cart"></i> Đơn hàng</a>
                                        </li>
                                        <li>
                                            <a id="pills-payment-tab" class="link--icon-left" data-toggle="pill" href="#pills-payment" role="tab"
                                                aria-controls="pills-payment" aria-selected="false"><i
                                                    class="fas fa-credit-card"></i> Phương thức thanh toán</a>
                                        </li>
                                        <li>
                                            <a id="pills-address-tab" class="link--icon-left" data-toggle="pill" href="#pills-address" role="tab"
                                                aria-controls="pills-address" aria-selected="false">
                                            <i class="fas fa-map-marker-alt"></i> Địa chỉ</a>
                                        </li>
                                        <li>
                                            <a id="pills-account-tab" class="link--icon-left" data-toggle="pill" href="#pills-account" role="tab"
                                                aria-controls="pills-account" aria-selected="false"><i class="fas fa-user"></i>
                                                Chi tiết tài khoản</a>
                                        </li>
                                        <li>
                                            <a class="link--icon-left" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fas fa-sign-out-alt"></i> Đăng Xuất
                                            </a>
                                            <form id="logout-form" method="POST" action="{{route('logout')}}">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-8 col-md-8">
                                <div class="tab-content my-account-tab" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel"
                                        aria-labelledby="pills-dashboard-tab">
                                        <div class="my-account-dashboard account-wrapper">
                                            <h4 class="account-title">Dashboard</h4>
                                            <div class="welcome-dashboard m-t-30">
                                                <p>Xin chào, <strong>{{$user->name}}</strong> (Nếu không phải <strong>{{$user->name}}!</strong> <a
                                                    href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Đăng xuất</a> )
                                                </p>
                                                <form id="logout-form" method="POST" action="{{route('logout')}}">
                                                    @csrf
                                                </form>
                                            </div>
                                            <p class="m-t-25">Từ trang tổng quan tài khoản của bạn. bạn có thể dễ dàng kiểm tra và xem các đơn đặt hàng gần đây, quản lý địa chỉ giao hàng và thanh toán cũng như chỉnh sửa mật khẩu và chi tiết tài khoản của mình.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-order" role="tabpanel" aria-labelledby="pills-order-tab">
                                        <div class="my-account-order account-wrapper">
                                            <h4 class="account-title">Đơn hàng</h4>
                                            <div class="account-table text-center m-t-30 table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="no">STT</th>
                                                            <th class="name">Tên sản phẩm</th>
                                                            <th class="date">Ngày</th>
                                                            <th class="status">Trạng thái</th>
                                                            <th class="total">Tổng tiền</th>
                                                            <th class="action">Hành động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-download" role="tabpanel"
                                        aria-labelledby="pills-download-tab">
                                        <div class="my-account-download account-wrapper">
                                            <h4 class="account-title">Download</h4>
                                            <div class="account-table text-center m-t-30 table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="name">Product</th>
                                                            <th class="date">Date</th>
                                                            <th class="status">Expire</th>
                                                            <th class="action">Download</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Mostarizing Oil</td>
                                                            <td>Aug 22, 2020</td>
                                                            <td>Yes</td>
                                                            <td><a href="#">Download File</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Katopeno Altuni</td>
                                                            <td>July 22, 2020</td>
                                                            <td>Never</td>
                                                            <td><a href="#">Download File</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-payment" role="tabpanel"
                                        aria-labelledby="pills-payment-tab">
                                        <div class="my-account-payment account-wrapper">
                                            <h4 class="account-title">Payment Method</h4>
                                            <p class="m-t-30">You Can't Saved Your Payment Method yet.</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-address" role="tabpanel"
                                        aria-labelledby="pills-address-tab">
                                        <div class="my-account-address account-wrapper">
                                            <h4 class="account-title">Payment Method</h4>
                                            <div class="account-address m-t-30">
                                                <h6 class="name">Alex Tuntuni</h6>
                                                <p>1355 Market St, Suite 900 <br> San Francisco, CA 94103</p>
                                                <p>Mobile: (123) 456-7890</p>
                                                <a class="box-btn m-t-25 " href="#"><i class="far fa-edit"></i> Edit Address</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-account" role="tabpanel"
                                        aria-labelledby="pills-account-tab">
                                        <div class="my-account-details account-wrapper">
                                            <h4 class="account-title">Account Details</h4>

                                            <div class="account-details">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <input type="text" placeholder="First Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <input type="text" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-box__single-group">
                                                            <input type="text" placeholder="Display Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-box__single-group">
                                                            <input type="text" placeholder="Email address">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-box__single-group">
                                                            <h5 class="title">Password change</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-box__single-group">
                                                            <input type="password" placeholder="Current Password">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <input type="password" placeholder="New Password">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <input type="password" placeholder="Confirm Password">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-box__single-group">
                                                            <button class="btn btn--box btn--small btn--uppercase btn--blue">Save Change</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- :::::::::: End My Account Section :::::::::: -->
                </div>
            </div>
        </div>
    </main>