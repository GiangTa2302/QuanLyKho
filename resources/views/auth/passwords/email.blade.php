{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
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
            <form action="{{ route('password.email') }}" method="POST">
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
    
