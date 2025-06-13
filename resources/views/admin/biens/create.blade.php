@extends('admin.admin')
@section('title', 'Creation d\'annonce immobilière')

@section('content')
    <div @class(['flex h-dvh gap-1'])>
        <div @class(['md:forPlace'])><!--row-span-3 border-2  md:bg-[#111] -->
            @include('admin.inc.menu')
        </div>

        <div id="content" @class(['w-auto grow text-lg p-4 border-2 border-indigo-500'])>
            <h3 @class(['uppercase my-5'])>@yield('title')</h3>

            @include('admin.biens._form', ['bien' => $bien, 'specificities' => $specificities])
        </div>
    </div>

@endsection
