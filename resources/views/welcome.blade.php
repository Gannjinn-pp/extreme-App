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

        <!-- Scripts Taiwindの読み込み-->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-cream ">
        <nav class="space-y-4 max-w-md mx-auto py-10">
            <img src="{{ asset('images/touji-piyo.png') }}" alt="画像">
            @auth
                <a
                    href="{{ url('/dashboard') }}"
                    class="block w-full text-center rounded-md bg-white px-3 py-2 text-black ring-1 ring-transparent transition hover:bg-orange-200 focus:outline-none focus-visible:ring-orange-500 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700 dark:focus-visible:ring-orange-500"
                >
                    ダッシュボード
                </a>
            @else
                <a
                    href="{{ route('login') }}"
                    class="block w-full text-center rounded-md bg-white px-3 py-2 text-black ring-1 ring-transparent transition hover:bg-orange-200 focus:outline-none focus-visible:ring-orange-500 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700 dark:focus-visible:ring-orange-500"
                >
                    ログイン
                </a>

                @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="block w-full text-center rounded-md bg-white px-3 py-2 text-black ring-1 ring-transparent transition hover:bg-orange-200 focus:outline-none focus-visible:ring-orange-500 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700 dark:focus-visible:ring-orange-500"
                    >
                        新規アカウント作成
                    </a>
                @endif
            @endauth
        </nav>
        <div>
        </div>
    </body>
</html>
