<!DOCTYPE html>
<html @class(['']) lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
<body class="w-full h-dvh box-border bg-[#f1f1f1] text-dark"><!-- scheme-light-gray bg-neutral-50sr-only container h-dvh-->

    <section @class([''])>
        @include('components.header')
    </section>
    <main @class(['overflow-auto'])><!-- id="main" md:overflow-y-auto-->
        @yield('content')
    </main>
    <section @class(['bottom-0'])><!--relative-->
        @include('components.footer')
    </section>
</body>
</html>
