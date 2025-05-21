<!doctype html>
<html @class(['h-dvh']) lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') |Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/js/tom-select.complete.min.js"></script>

    {{--
    'resources/js/ext/tom-select-complete.js',
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/js/tom-select.complete.min.js"></script>
--}}
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/views/admin/admin-partials.js', 'resources/js/views/admin/index.js'])
        @stack('scripts')
    @endif
</head>
<body @class([''])>
<div @class(['flex min-h-full flex-col'])>
    <header @class(['grid grid-cols-2 gap-6 justify-between bg-[#ff0001] p-4 border-2'])>
        <h1 @class(['text-start text-2xl medium italic'])>Page d'administration</h1>
        <span id="open" @class(['text-end text-2xl semibold normal md:invisible']) style="cursor:pointer">&#9776; menu</span>

    </header>

    <main @class(['h-dvh grow overflow-x-auto'])><!-- w-full h-screen p-4 bg-gray-100/50-->
        <div @class([''])>
            @if(session('success'))
                <div @class(['text-success'])>
                    {{ session('success') }}
                </div>
            @endif
        </div>

        @if($errors->any())
            @foreach($errors->all() as $error)
                <ul @class(['text-danger my-0'])>
                    {{ $error }}
                </ul>
            @endforeach
        @endif
        @yield('content')
    </main>

    <footer></footer>
</div>


</body>
</html>
<!--
<div class(['grid grid-flow-col grid-rows-4 gap-4 h-dvh'])>
    <div class(['row-span-3 border-2 absolute'])>
        include('admin.inc.menu')
    </div>
    <div class(['col-span-2 border-2 border-yellow-500'])>
        <header class(['grid grid-cols-2 gap-6 justify-between bg-indigo-400 p-4 border-2'])>
            <h1 class(['text-start text-2xl medium italic'])>Page d'administration</h1>
            <span id="open" class(['text-end text-2xl semibold normal md:invisible']) style="cursor:pointer">&#9776; menu</span>
        </header>
    </div>
    <div class(['col-span-2 row-span-2'])>
        <h1>The content</h1>
    </div>

    <footer class(['col-span-2 border-2 border-green-500'])>
        <ul class(['text-center mx-auto'])>
            <li>1</li>
            <li>2</li>
            <li>3</li>
        </ul>
    </footer>
</div>
-->
