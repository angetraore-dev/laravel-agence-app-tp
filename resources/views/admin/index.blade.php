@extends('admin.admin')
@section('title', 'Page admin')

@section('content')
    <div @class(['flex h-dvh gap-1'])>
        <div @class(['md:forPlace'])><!--row-span-3 border-2  md:bg-[#111] -->
            @include('admin.inc.menu')
        </div>

        <div id="content" @class(['w-auto grow text-3xl p-4 border-2 border-indigo-500'])>
            <h3 @class(['text-center'])> The content</h3>
            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aut consequuntur cupiditate dicta dolor, eligendi enim error eveniet ipsam laudantium magnam nesciunt optio, quaerat repellendus sint totam voluptatibus? Eos, officia!
            </p>
        </div>
    </div>


@endsection

@push('scripts')
    @vite('resources/js/views/admin/index.js')
@endpush
