{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

<x-guest-layout>
    <div class="login-form-container">
        <div class="login-register-form p-4" >   
            <x-jet-validation-errors class="mb-4 text-danger" />            
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="form-box__single-group">
                    <label class="form-label">Email</label>
                    <input type="email" id="form-username" name="email" placeholder="Email" value="{{old('email')}}" required autofocus >
                    
                </div>
                <div class="form-box__single-group">
                    <label class="form-label" >Mật khẩu</label>
                    <input type="password" id="form-username-password" name="password" placeholder="*******"  value="{{old('password')}}" required autocomplete="current-password" >
                </div>
                <div class="d-flex justify-content-between flex-wrap m-tb-20">
                    <label for="account-remember">
                        <input type="checkbox" name="remember" id="rememberme">
                        <span>Remember me</span>
                    </label>
                    <a class="link--gray" href="{{route('password.request')}}">Forgot Password?</a>
                </div>
                <div class="text-center">
                    <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>