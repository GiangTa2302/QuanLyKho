{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

<x-guest-layout>
    <div class="login-form-container">
        <div class="login-register-form p-4" >   
            <x-jet-validation-errors class="mb-4 text-danger" />            
            <form action="{{route('password.email')}}" method="POST">
                @csrf
                <div class="form-box__single-group m-tb-20">
                    <label class="form-label">Email</label>
                    <input type="email" id="form-username" name="email" placeholder="Email" required autofocus >
                </div>
                <div class="text-center">
                    <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit">RESET PASSWORD</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>