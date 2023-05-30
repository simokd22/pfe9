

<x-guest-layout >

    <x-authentication-card >

        <x-slot name="logo">
            <a href="{{ route('login') }}">
                <img src="{{ asset('logo/blue_symbol.png') }}" alt="Logo" class="w-12 h-12 mr-2" />
            </a>
        </x-slot>

        <x-validation-errors class="mb-4" />


        <h1 style="font-size: 36px; text-align: center; margin-bottom:20px">Log in</h1>


        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <form  method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4 hidden" >
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" checked />
                    <span class="ml-2 text-sm text-gray-600 dark:text-dark-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-dark-900 " href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                @if (Route::has('register'))
                    <div class="ml-4">

                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-dark-900 " href="{{ route('register') }}">{{ __('You dont have an account? Register here') }}</a>
                    </div>
                @endif

                <x-button class="ml-4">
                    {{ __('Login') }}
                </x-button>
            </div>

        </form>
    </x-authentication-card>
</x-guest-layout>
