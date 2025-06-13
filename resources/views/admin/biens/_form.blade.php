@extends('admin.admin')
@section('title', ($bien->exists) ? 'Editer' : 'Enregistrer un bien')

@section('content')
    <div @class(['flex h-dvh gap-1'])>
        <div @class(['w-auto'])><!--row-span-3 border-2  md:bg-[#111] -->
            @include('admin.inc.menu')
        </div>
        <div id="content" @class(['w-auto grow p-4'])>


            <h3 @class(['my-5 text-center text-lg font-medium text-orange-500'])>@yield('title')</h3>
            <form @class(['form h-min-dvh rounded-lg text-lg shadow-lg w-auto md:mx-auto lg:w-2/3']) method="post" action="{{ ($bien->exists) ? route('admin.bien.update', $bien) : route('admin.bien.store') }}" name="bien">
                @csrf
                @method($bien->exists ? 'PATCH':'POST')

                <div @class(['md:grid grid-cols-2 md:justify-between md:gap-4 lg:w-md'])>
                    @include('components.form-group', ['label' => 'Titre', 'name' => 'title', 'id' => 'title', 'value' => $bien->title] )
                    @include('components.bien_immobilier.select_type', ['class' => 'w-full',  'id' => 'type', 'name' => 'type', 'label' => 'Type de bien immobilier', 'value' => $bien->getCasts()['type']::cases() ])
                </div>
                <div data-id="appartements" id="appartementsDiv" @class(['typeDiv grid grid-cols-1 gap-6  p-2 rounded-md sm:grid-cols-3 sm:gap-4 mb-4 hidden'])>
                    @include('components.bien_immobilier.typeForms._form_appartement', ['bien_appart' => $bien ])
                </div>
                <div data-id="maison" id="maisonDiv" @class(['typeDiv grid grid-cols-1 rounded-md gap-6 p-2 sm:grid-cols-3 sm:gap-4 mb-4 hidden'])>
                    @include('components.bien_immobilier.typeForms._form_maison', ['bien_maison' => $bien ])
                </div>
                <div data-id="terrain" id="terrainDiv" @class(['typeDiv grid grid-cols-1 gap-6 rounded-md p-2 sm:grid-cols-3 sm:gap-4 mb-4 hidden'])>
                    @include('components.bien_immobilier.typeForms._form_terrain', ['bien_terrain' => $bien ])
                </div>
                <div @class(['grid grid-cols-1 gap-4 sm:grid-cols-3 sm:gap-4'])>

                    @include('components.form-group', ['type' => 'number', 'label' => 'Surface', 'name' => 'surface', 'id' => 'surface', 'value' => $bien->surface] )
                    @include('components.form-group', ['type' => 'number', 'label' => 'Piece', 'name' => 'rooms', 'id' => 'rooms', 'value' => $bien->rooms] )
                    @include('components.form-group', ['type' => 'number', 'label' => 'Chambre(s)', 'name' => 'bedrooms', 'id' => 'bedrooms', 'value' => $bien->bedrooms] )
                    {{--@include('components.form-group', ['type' => 'number', 'label' => 'Niveau', 'name' => 'floor', 'id' => 'floor', 'value' => 0] )--}}
                </div>
                <div @class([''])>
                    @include('components.form-group', ['type' => 'number', 'label' => 'prix', 'name' => 'price', 'id' => 'price', 'value' => $bien->price] )
                </div>
                <div @class(['grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3'])>
                    @include('components.form-group', ['label' => 'Ville', 'name' => 'city', 'id' => 'city', 'value' => $bien->city] )
                    @include('components.form-group', ['label' => 'Adresse', 'name' => 'adresse', 'id' => 'adresse', 'value' => $bien->adresse] )
                </div>

                <div @class(['grid grid-cols-1 sm:grid-cols-2 gap-4'])>
                    @include('components.form-group', ['type' => 'textarea', 'label' => 'Description', 'name' => 'description', 'id' => 'description', 'value' => __($bien->description)] )
                    @include('components.bien_immobilier.select_specificity', ['multiple' => 'multiple', 'label' => 'Specificités', 'name' => 'specificities', 'datas' => $specificities ])
                </div>
                <div @class(['grid grid-cols-1'])>
                    @include('components.bien_immobilier.select_status', ['name' => 'sold', 'label' => 'status du bien', 'class' => 'w-auto border-2 border-dark', 'value' => $bien->getCasts()['status']::cases() ] )
                    <input type="hidden" name="user_id" id="user_id" value="{{ 1 }}">
                </div>

                <div @class(['flex col justify-end gap-6 text-end'])>
                    <button @class(['btn btn-primary w-auto text-center md:w-1/2'])>
                        @yield('title')
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
@push('scripts')
    @vite('resources/js/views/admin/biens/_form_index.js')
@endpush
