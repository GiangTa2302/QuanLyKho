{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<x-guest-layout>
    <div class="container">
        <div class="login-register-form p-4" >   
            <x-jet-validation-errors class="mb-4 text-danger" />            
            <form action="{{ route('password.confirm') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-box__single-group">
                    <label class="form-label">Email</label>
                    <input type="email" id="form-username" name="email" placeholder="Email" value="{{old('email')}}" required autofocus >
                </div>
                <div class="form-box__single-group">
                    <label class="form-label" >Mật khẩu</label>
                    <input type="password" id="form-username-password" name="password" placeholder="*******"  value="{{old('password')}}" required autocomplete="current-password" >
                </div>
                <div class="form-box__single-group m-tb-20">
                    <label class="form-label" >Nhập lại mật khẩu</label>
                    <input type="password" id="form-username-password" name="password-confirm" placeholder="*******"  value="{{old('password-confirm')}}" required autocomplete="current-password" >
                </div>
                <div class="text-center">
                    <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit">RESET PASSWORD</button>
                </div>
            </form>
        </div>
    </div>
    <x-guest-layout>
    
