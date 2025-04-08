<article @class(['relative p-1'])>
    <div class="sticky top-0 right-0 left-0">
        <header @class(['w-full bg-gray-200 rounded-md uppercase text-lg p-2 md:w-3/4 mx-auto md:normal-case border-l-2 border-t-2 border-red-500'])><!--border-t-2 border-red-500-->
            <marquee @class(['md:bg-white']) scrollamount="4">Les informations de la direction </marquee>
        </header>
        <nav @class(['w-full rounded-md shadow-lg border-b-2 border-r-2 border-red-500 mt-2 bg-white text-red-500'])>
            <div class="w-full flex justify-between p-2 uppercase">
                <a class=" w-1/4 m-r-4 p-2 sm:flex text-2xl hover:text-blue-400" href="{{route('homepage.index')}}">TP Laravel 1</a>
                <div @class(['w-3/4 text-blue-200 justify-between flex lg:justify-right'])>
                    <div @class(['md:w-1/2 border-4 border-red-50 rounded-lg'])>
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
    <!--m-2 lg:justify-center justify-items-center gap-4 p-4 border font-textFont-->
