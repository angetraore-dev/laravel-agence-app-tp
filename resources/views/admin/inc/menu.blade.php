<div id="menuContainer" @class(['absolute text-2xl'])>
    <div id="mySidenav" @class(['sidenav w-0 pt-6 fixed bg-[#111] overflow-x-auto border-1 border-indigo-600 h-dvh text-2xl medium'])>
        <a id="close" href="javascript:void(0)" class="closebtn p-4">&times;</a>
        <a @class(['py-4 px-4 mt-4 text-[#818181] hover:text-white hover:bg-[#818181]']) href="{{ route('admin.property.index') }}">Les propriétés</a>
        <a @class(['py-4 px-4 text-[#818181] hover:text-white hover:bg-[#818181]']) href="#">Menu 2</a>
        <a @class(['py-4 px-4 text-[#818181] hover:text-white hover:bg-[#818181]']) href="#">Menu 3</a>
        <a @class(['py-4 px-4 text-[#818181] hover:text-white hover:bg-[#818181]']) href="#">Menu 4</a>
    </div>
    <span id="openSide" @class(['invisible md:visible semibold']) style="cursor:pointer">&#9776;menu</span>
</div>
