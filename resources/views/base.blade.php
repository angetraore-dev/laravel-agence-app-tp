<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laravel</title>

    <!-- Fonts
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    -->
    <!-- Styles -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('scripts')
   @endif
</head>
<body class="w-full p-2 box-border text-dark h-screen scheme-light-gray"><!-- bg-neutral-50sr-only container h-dvh-->

    @include('components.header')
    <main id="main" @class(['overflow-x-auto md:overflow-y-auto'])><!--md:overflow-y-auto-->
        @yield('content')
    </main>
    <section @class([''])><!--relative-->
        @include('components.footer')
    </section>
</body>
</html>
