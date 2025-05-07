<!doctype html>
<html @class(['h-dvh']) lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') |Administration</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/views/admin/admin-partials.js'])
        @stack('scripts')
    @endif
</head>
<body @class(['flex min-h-full flex-col'])>

    <header @class(['grid grid-cols-2 gap-6 justify-between bg-[#ff0001] p-4 border-2'])>
        <h1 @class(['text-start text-2xl medium italic'])>Page d'administration</h1>
        <!--<h1 @class(['text-end text-2xl semibold normal'])>Service</h1>-->
        <span id="open" @class(['text-end text-2xl semibold normal md:invisible']) style="cursor:pointer">&#9776; menu</span>

    </header>

    <main @class(['h-dvh grow overflow-x-auto'])><!-- w-full h-screen p-4 bg-gray-100/50-->
        @yield('content')
    </main>

    <footer></footer>

</body>
</html>
