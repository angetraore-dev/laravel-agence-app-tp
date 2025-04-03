<header @class(['my-2 max-w-100'])>
<marquee>Les informations de la direction </marquee>
</header>
<nav @class(['bg-white text-red-500'])>
    <div class="w-full flex justify-between gap-4 p-2 uppercase">
        <a class=" w-1/4 m-r-4 p-2 sm:flex text-2xl hover:text-blue-400" href="{{route('homepage.index')}}">TP Laravel 1</a>
        <div @class(['w-3/4 text-blue-200 justify-between flex lg:justify-right'])>
            <div @class(['w-1/2 border-4 border-red-50 rounded-lg'])>
                <input type="text" @class(['w-full focus:border-indigo-600 focus:outline-hidden p-2']) placeholder="recherche" id="search" name="search">
            </div>
            <div @class(['w-1/2 border-4 border-dark-500'])>
                <ul @class(['justify-between p-2 text-red-400  text-small lg:flex md:flex sm:hidden grid'])>
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

<!--m-2 lg:justify-center justify-items-center gap-4 p-4 border font-textFont-->
