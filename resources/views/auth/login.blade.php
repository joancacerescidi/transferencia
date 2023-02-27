<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">

                @if (Route::has('register'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        {{ __('Registrarse') }}
                    </a>
                @endif
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Ingresar') }}
                </x-button>
            </div>
            <div class="grid grid-cols-2 items-center gap-4 mt-4">
                <a href="{{ route('facebook') }}"
                    class="cursor-pointer text-[10px] sm:text-base flex items-center justify-center gap-4 py-4 border-2 border-[#1976D2] bg-[#1976D2] text-white rounded-2xl">
                    <img width="8" height="13" src="{{ asset('images/facebook.svg') }}" alt="Facebook qqperu" />
                    <span class="text[10px] font-semibold">FACEBOOK</span>

                </a>

                <a
                href="{{ route('google') }}"
                    class="cursor-pointer text-[10px] sm:text-base flex items-center justify-center gap-4 py-4 border-2 border-gray-300 bg-white rounded-2xl">
                    <img width="24" height="24" src="{{ asset('images/google.svg') }}" alt="Sendi Google" />
                    <span class="text[10px] font-semibold">GOOGLE</span>
                </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
