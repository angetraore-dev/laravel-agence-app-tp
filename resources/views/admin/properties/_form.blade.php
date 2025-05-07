@extends('admin.admin')
@section('title', ($property->exists) ? 'Editer un bien' : 'Créer un bien')

@section('content')
    <div @class(['flex h-dvh gap-1'])>
        <div @class(['w-auto'])><!--row-span-3 border-2  md:bg-[#111] -->
            @include('admin.inc.menu')
        </div>

        <div id="content" @class(['w-auto grow p-4'])>

            <h3 @class(['my-5 text-center text-2xl'])>@yield('title')</h3>

            <form @class(['form h-min-dvh rounded-lg text-lg shadow-lg w-auto md:mx-auto lg:w-2/3']) method="" action="{{ route('admin.property.create') }}" name="create-property">
                @csrf
                @method($property->exists ? 'PATCH':'POST')

                <div @class(['md:grid grid-cols-2 md:justify-between md:gap-4 lg:w-md'])>
                    <div @class(['flex flex-col w-full md:grid grid-cols-1 mb-4'])><!--md:grid grid-cols-1-->
                        <label @class(['label']) @class(['label']) for="title">Titre</label>
                        <input @class(['form-control']) id="title" name="title" type="text" value="" placeholder="entrer un titre">
                    </div>
                    <div @class(['flex flex-col w-full md:grid grid-cols-1 mb-4'])>
                        <label @class(['label']) for="surface">Surface(en m2)</label>
                        <input @class(['form-control']) id="surface" name="surface" type="number" min="10" value="" placeholder="ex. 10">
                    </div>
                </div>

                <div @class(['form-group'])>
                    <div @class(['flex flex-col w-full md:grid grid-cols-1 mb-4'])><!--sm:flex flex-wrap mb-4 sm:justify-between-->
                        <label @class(['label']) for="title">Pièce(s)</label>
                        <input @class(['form-control']) id="title" name="title" type="text" value="" placeholder="entrer un titre">
                    </div>
                    <div @class(['flex flex-col w-full md:grid grid-cols-1 mb-4'])><!--flex flex-col sm:flex flex-wrap mb-4 sm:justify-between-->
                        <label @class(['label']) for="surface">Chambre(s)</label>
                        <input @class(['form-control']) id="surface" name="surface" type="number" min="10" value="" placeholder="ex. 10">
                    </div>
                </div>

                <div @class(['form-group md:grid grid-cols-2 md:justify-between md:gap-4 lg:w-md'])>
                    <div @class(['flex flex-col w-full md:grid grid-cols-1 mb-4'])><!--sm:flex flex-wrap mb-4 sm:justify-between-->
                        <label @class(['label']) for="title">Salon(s)</label>
                        <input @class(['form-control']) id="title" name="title" type="text" value="" placeholder="entrer un titre">
                    </div>
                    <div @class(['flex flex-col w-full md:grid grid-cols-1 mb-4'])><!--flex flex-col sm:flex flex-wrap mb-4 sm:justify-between-->
                        <label @class(['label']) for="surface">Prix(s)</label>
                        <input @class(['form-control']) id="surface" name="surface" type="number" min="10" value="" placeholder="ex. 10">
                    </div>
                </div>

                <div @class(['form-group md:grid grid-cols-2 md:justify-between md:gap-4 lg:w-md'])>
                    <div @class(['flex flex-col w-full md:grid grid-cols-1 mb-4'])><!--sm:flex flex-wrap mb-4 sm:justify-between-->
                        <label @class(['label']) for="title">Ville(s)</label>
                        <input @class(['form-control']) id="title" name="title" type="text" value="" placeholder="entrer un titre">
                    </div>
                    <div @class(['flex flex-col w-full md:grid grid-cols-1 mb-4'])><!--flex flex-col sm:flex flex-wrap mb-4 sm:justify-between-->
                        <label @class(['label']) for="surface">Code postal</label>
                        <input @class(['form-control']) id="surface" name="surface" type="number" min="10" value="" placeholder="ex. 10">
                    </div>
                </div>
                <div @class(['form-group md:grid grid-cols-2 md:justify-between md:gap-4 lg:w-md'])>
                    <div @class(['flex flex-col w-full md:grid grid-cols-1 mb-4'])><!--sm:flex flex-wrap mb-4 sm:justify-between-->
                        <label @class(['label text-indigo-700']) for="title">Description(s)</label>
                        <textarea @class(['form-control w-full']) cols="2">ddd</textarea>
                    </div>

                </div>

                <div @class(['w-full mt-5 text-end'])>
                    <button @class(['btn btn-dark'])>
                        @yield('title')
                    </button>
                </div>
            </form>

        </div>
    </div>

@endsection

@push('scripts')
    @vite('resources/js/views/admin/index.js')
@endpush
