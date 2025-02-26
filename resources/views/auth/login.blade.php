<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Ingat Saya') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-center mt-4">


            <x-primary-button class="ms-3 ">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>


        <div class="flex items-center justify-center mt-4">
            @if (Route::has('password.request'))
            <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Lupa kata sandi Anda?') }}
            </a>
            @endif
            <span style="margin: 0 5px;">&nbsp;</span>
            <a class="underline text-sm text-gray-2000 hover:text-gray-1000 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request')}}">
                {{ __('Reset') }}
            </a>
        </div>

        <div class="flex items-center justify-center mt-4">
            @if (Route::has('password.request'))
            <x-input-label for="email" :value="__('')" />
            <a class=" text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Sudah mempunyai akun?' ) }}
            </a>
            @endif
            <span style="margin: 0 5px;">&nbsp;</span>
            <a class="underline text-sm text-gray-2000 hover:text-gray-1000 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                {{ __('Daftar') }}
            </a>
        </div>
    </form>
</x-guest-layout>