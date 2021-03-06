{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

<x-guest-layout>
    <div class="login-form-container">
        <div class="login-register-form p-4">
            <x-jet-validation-errors class="mb-4" />
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="form-box__single-group">
                    <label class="form-label" >H??? t??n</label>
                    <input type="text" id="form-register-username" name="name" placeholder="Nh???p h??? t??n" value="{{old('name')}}" >
                </div>
                <div class="form-box__single-group">
                    <label class="form-label" >Email</label>
                    <input type="email" id="form-uregister-sername-email" name="email" placeholder="Nh???p email" value="{{old('email')}}">
                    
                </div>
                <div class="form-box__single-group">
                    <label class="form-label" >M???t kh???u</label>
                    <input type="password" id="form-register-username-password" name="password" placeholder="********" value="{{old('password')}}" >
                    
                </div>
                <div class="form-box__single-group">
                    <label class="form-label" >X??c nh???n m???t kh???u</label>
                    <input type="password" id="form-register-username-password" name="password_confirmation" placeholder="********" value="{{old('password_confirmation')}}">
                    
                </div>
                <div class="form-box__single-group">
                    <label class="form-label" >?????a ch???</label>
                    <input type="text" id="form-register-address" name="address" placeholder="Nh???p ?????a ch???" value="{{old('address')}}" >
                    
                </div>
                <div class="form-box__single-group mb-5">
                    <label class="form-label" >S??? ??i???n tho???i</label>
                    <input type="text" id="form-register-phonenumber" name="phone" placeholder="Nh???p s??? ??i???n tho???i" value="{{old('phone')}}" >
                </div>
                <div class="form-box__single-group mb-5">
                    <select name="is_admin" id="is_admin">
                        <label class="form-label">?????i t?????ng</label>
                        <option value="0">Kh??ch h??ng</option>
                        <option value="2">Nh?? cung c???p</option>
                    </select>
                </div>
                <div>
                    <input type="hidden" name="image" value="1652787335.jpg">
                </div>
                <div class="text-center">
                    <button class="btn btn--box btn--small btn--blue btn--uppercase btn--weight" type="submit">REGISTER</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>