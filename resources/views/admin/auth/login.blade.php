<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-gray-900">
    <div class="flex flex-col items-center pt-6 min-h-screen bg-gray-200 sm:justify-center sm:pt-0">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </div>

        <div class="overflow-hidden px-6 py-4 mt-6 w-full bg-white shadow-md sm:max-w-md sm:rounded-lg">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />


             <div class="mb-6 text-center">
                <h1 class="text-2xl font-bold text-gray-800">Admin Login</h1>
                <p class="text-gray-600">Sign in to admin panel</p>
            </div>

            <form method="POST" action="{{ route('admin.login.store') }}">
                @csrf

                <!-- Email -->

                <x-form-input id="email" type="email" name="email" label="Email" placeholder="Email"
                    :messages="$errors->get('email')" />

                <x-form-input id="password" type="password" name="password" label="Password" placeholder="Password"
                    required :messages="$errors->get('password')" />


                <div class="flex justify-between items-center mb-4">

                    <x-form-checkbox name="remember_me" id="remember_me" label="Remember me" :checked="old('remember_me')" />

                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:text-blue-800" href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>




                <x-form-button id="sign-in-btn" type="submit" size='sm' width='w-[100%]'>
                    Sign In
                </x-form-button>

                <div class="mt-5 text-center">
                    <p class="text-sm text-gray-600">
                        Don't have an account?
                        <a href="{{ route('admin.register.index') }}" class="font-medium text-blue-600 hover:text-blue-800">
                            Sign up
                        </a>
                    </p>
                </div>

            </form>
        </div>
        <div class="mt-6 text-sm text-center text-gray-500">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>

</html>


