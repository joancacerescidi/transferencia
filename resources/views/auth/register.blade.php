<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('¿Ya estas registrado?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Registrarse') }}
                </x-button>
            </div>
            <div class="grid grid-cols-2 items-center gap-4 mt-4">
                <a
                    class="cursor-pointer text-[10px] sm:text-base flex items-center justify-center gap-4 py-4 border-2 border-[#1976D2] bg-[#1976D2] text-white rounded-2xl">
                    <img width="8" height="13" src="{{ asset('images/facebook.svg') }}" alt="Facebook qqperu" />
                    <span class="text[10px] font-semibold">FACEBOOK</span>

                </a>

                <a
                    class="cursor-pointer text-[10px] sm:text-base flex items-center justify-center gap-4 py-4 border-2 border-gray-300 bg-white rounded-2xl">
                    <img width="24" height="24" src="{{ asset('images/google.svg') }}" alt="Sendi Google" />
                    <span class="text[10px] font-semibold">GOOGLE</span>
                </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
