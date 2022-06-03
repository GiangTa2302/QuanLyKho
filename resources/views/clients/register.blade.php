<div id="lg2" class="tab-pane">
    <div class="login-form-container m-5">
        <div class="login-register-form">
            @if(session('msg'))
                <div class="alert alert-success">{{session('msg')}}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ!</div>
            @endif
            <form action="" method="POST">
                <div class="form-box__single-group">
                    <input type="text" id="form-register-username" name="name" placeholder="Nhập họ tên" value="{{old('name')}}" >
                    @error('name')
                        <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-box__single-group">
                    <input type="text" id="form-uregister-sername-email" name="email" placeholder="Nhập email" value="{{old('email')}}">
                    @error('email')
                        <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-box__single-group">
                    <input type="password" id="form-register-username-password" name="password" placeholder="Mật khẩu" value="{{old('password')}}" >
                    @error('password')
                        <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-box__single-group">
                    <input type="password" id="form-register-username-password" name="password_confirmation" placeholder="Xác nhận mật khẩu" value="{{old('password_confirmation')}}">
                    @error('password_confirmation')
                        <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-box__single-group">
                    <input type="text" id="form-register-address" name="address" placeholder="Nhập địa chỉ" value="{{old('address')}}" >
                    @error('address')
                        <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-box__single-group mb-5">
                    <input type="text" id="form-register-phonenumber" name="phone" placeholder="Nhập số điện thoại" value="{{old('phone')}}" >
                    @error('phone')
                        <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-box__single-group mb-5">
                    <select name="role" id="">
                        <option value="1">Nhà cung cấp</option>
                        <option value="2">Khách hàng</option>
                    </select>
                </div>
                <div class="text-center">
                    <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit">REGISTER</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>