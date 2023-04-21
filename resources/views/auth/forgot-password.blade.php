<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/style_login.css') }}">
    <!--about-->
<div class="about">
<a href={{url('/about')}} class="about">about</i></a>
</div>
<!--about-->
 <!--terms-->
 <div class="terms">
    <a href={{url('/terms')}} class="term-service">Terms</i></a>
  </div>
  <!--terms-->
    <x-authentication-card>
        <x-slot name="logo">
            <a href="{{ route('login') }}">
                <img src="{{ asset('logo/blue_symbol.png') }}" alt="Logo" class="w-12 h-12 mr-2" />
            </a>
        </x-slot>


        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif


        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
