<div class="login-form-container">
    <div class="login-register-form ml-5 mr-5">
        @if(session('msg'))
            <div class="alert alert-success">{{session('msg')}}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">Dữ liệu nhập vào không hợp lệ!</div>
        @endif

        <form action="" method="POST">
            <div class="form-box__single-group">
                <input type="email" id="form-username" name="email" placeholder="Email" value="{{old('email')}}" >
                @error('email')
                    <span style="color:red">{{$message}}</span>
                @enderror
            </div>
            <div class="form-box__single-group">
                <input type="password" id="form-username-password" name="password" placeholder="Password"  value="{{old('password')}}" >
                @error('password')
                    <span style="color:red">{{$message}}</span>
                @enderror
            </div>
            <div class="d-flex justify-content-between flex-wrap m-tb-20">
                <label for="account-remember">
                    <input type="checkbox" name="account-remember" id="account-remember">
                    <span>Remember me</span>
                </label>
                <a class="link--gray" href="#">Forgot Password?</a>
            </div>
            
            <div class="text-center">
                <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit">LOGIN</button>
            </div>
        </form>
    </div>
</div>