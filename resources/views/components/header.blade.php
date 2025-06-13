<article @class(['relative p-1'])>
    <div class="sticky top-0 right-0 left-0">
        <header @class(['w-full bg-gray-200 rounded-md uppercase text-lg p-2 md:w-3/4 mx-auto md:normal-case border-l-2 border-t-2 border-red-500'])><!--border-t-2 border-red-500-->
            <marquee @class(['md:bg-white']) scrollamount="4">Les informations de la direction </marquee>
        </header>
    </div>
</article>


<nav @class(['flex items-center justify-between flex-wrap p-4 rounded-md shadow-lg bg-teal-500'])>
    <!-- Img and Website Name -->
    <div @class(['flex items-center flex-shrink-0 text-white mr-6'])>
        <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"/></svg>
        <span class="font-semibold text-xl tracking-tight">Laravel Immo</span>
    </div>

    <!-- Toggle -->
    <div class="block md:hidden">
        <button id="toggleButton" class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
    </div>

    <!-- Menu items and Search Bar lg:flex lg:items-center lg:w-auto-->
    <div class="w-full block flex-grow md:flex md:items-center md:w-auto">
        <div id="navItems" class="hidden md:block text-sm md:flex-grow">
            <a href="{{ route('homepage.index') }}" class="block mt-4 md:inline-block md:mt-0 text-teal-200 hover:text-white mr-4">
                Accueil
            </a>
            <a href="{{ route('property.index') }}" class="block mt-4 md:inline-block md:mt-0 text-teal-200 hover:text-white mr-4">
                Les Annonces
            </a>
            <a href="{{ route('admin.bien.index') }}" class="block mt-4 md:inline-block md:mt-0 text-teal-200 hover:text-white mr-4">
                Les Biens
            </a>

            <a href="{{ route('admin.index') }}" class="block mt-4 md:inline-block md:mt-0 text-teal-200 hover:text-white mr-4">
                Admin
            </a>
            @guest
                <a href="{{route('security.login')}}" class="block mt-4 md:inline-block md:mt-0 text-teal-200 hover:text-white">
                    Se connecter
                </a>
            @endguest

        </div>
        <div @class(['mt-4 lg:mt-0'])>
            <input type="text" @class(['w-full rounded-md shadow-lg focus:border-indigo-600 focus:outline-hidden p-2']) placeholder="recherche" id="search" name="search">
        </div>
    </div>
</nav>

<!--
<article @class(['relative p-1'])>
    <div class="sticky top-0 right-0 left-0">
        <header @class(['w-full bg-gray-200 rounded-md uppercase text-lg p-2 md:w-3/4 mx-auto md:normal-case border-l-2 border-t-2 border-red-500'])>
<marquee @class(['md:bg-white']) scrollamount="4">Les informations de la direction </marquee>
</header>
<nav @class(['w-full rounded-md shadow-lg border-b-2 border-r-2 border-red-500 mt-2 bg-white text-red-500'])>
    <div class="w-full flex justify-between p-2 uppercase">
        <a class=" w-1/4 m-r-4 p-2 sm:flex text-2xl hover:text-blue-400" href="{{route('homepage.index')}}">TP Laravel 1</a>

        <button id="toggleButton" type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-dark hover:bg-blue-500 hover:text-red-500 focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>

            <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>

            <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
        <div @class(['md:w-3/4 text-blue-200 justify-between flex lg:justify-right'])>
            <div @class(['w-full md:w-1/2 border-4 border-red-50 rounded-lg'])>
                <input type="text" @class(['w-full focus:border-indigo-600 focus:outline-hidden p-2']) placeholder="recherche" id="search" name="search">
            </div>
            <div @class(['invisible md:w-1/2 text-md p-2 md:visible md:normal-case'])>
                <ul @class(['justify-between md:flex'])>
                    <li>
                        <a class="">Menu 1</a>
                    </li>
                    <li>
                        <a class="">Menu 2</a>
                    </li>
                    <li>
                        <a class="">Menu 3</a>
                    </li>
                    <li>
                        @guest
                            <a class="" href="{{ route('security.login') }}">se connecter</a>
                        @endguest
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
</div>
</article>
-->
