@php
$route = request()->route()->getName();
//{{ str_contains($route, 'property.index') }}
@endphp
<div id="menuContainer" @class([''])>
    <div id="mySidenav" @class(['h-dvh sidenav w-0 pt-6 pe-2 uppercase text-sm fixed bg-[#111] overflow-x-auto'])>
        <a id="close" href="javascript:void(0)" @class(['closebtn text-white text-end mb-4'])>&times;</a>
        <a @class(['block text-decoration-none no-underline py-4 px-4 text-[#818181] hover:text-white hover:bg-[#818181]']) href="{{ route('homepage.index')  }}">Landing page</a>
        <a @class(['text-sm block text-decoration-none no-underline pt-4 px-4 pb-2 pe-4 mt-4 text-[#818181] hover:text-white hover:bg-[#818181]']) href="{{ route('admin.property.index') }}">Gérer les propriétés</a>
        <a @class(['text-sm block text-decoration-none no-underline py-4 px-4 text-[#818181] hover:text-white hover:bg-[#818181]']) href="{{ route('admin.option.index') }}">Gérer les options</a>
        <a @class(['text-sm block text-decoration-none no-underline py-4 px-4 text-[#818181] hover:text-white hover:bg-[#818181]']) href="#">Menu 4</a>
    </div>
    <span id="openSide" @class(['invisible md:visible semibold uppercase']) style="cursor:pointer">&#9776;menu</span>
</div>
<!--padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;-->
