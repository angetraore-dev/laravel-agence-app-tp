@extends('admin.admin')
@section('title', ($property->exists) ? 'Editer' : 'Créer une annonce')

@section('content')
    <div @class(['flex h-dvh gap-1'])>
        <div @class(['w-auto'])><!--row-span-3 border-2  md:bg-[#111] -->
            @include('admin.inc.menu')
        </div>

        <div id="content" @class(['w-auto grow p-4'])>

            <h3 @class(['my-5 text-center text-lg font-medium text-orange-500'])>@yield('title')</h3>
            <form @class(['form h-min-dvh rounded-lg text-lg shadow-lg w-auto md:mx-auto lg:w-2/3']) method="post" action="{{ ($property->exists) ? route('admin.property.update', $property) : route('admin.property.store') }}" name="property">
                @csrf
                @method($property->exists ? 'PATCH':'POST')

                <div @class(['md:grid grid-cols-2 md:justify-between md:gap-4 lg:w-md'])>
                        @include('components.form-group', ['label' => 'Titre', 'name' => 'title', 'id' => 'title', 'value' => $property->title] )
                        @include('components.form-group', ['type' => 'textarea', 'label' => 'Description', 'name' => 'description', 'id' => 'description', 'value' => $property->description] )
                </div>
                <div @class(['grid grid-cols-1 gap-4 sm:grid-cols-4 sm:gap-3'])>

                    @include('components.form-group', ['type' => 'number', 'label' => 'Surface', 'name' => 'surface', 'id' => 'surface', 'value' => $property->surface] )
                    @include('components.form-group', ['type' => 'number', 'label' => 'Piece', 'name' => 'rooms', 'id' => 'rooms', 'value' => $property->rooms] )
                    @include('components.form-group', ['type' => 'number', 'label' => 'Chambre(s)', 'name' => 'bedrooms', 'id' => 'bedrooms', 'value' => $property->bedrooms] )
                    @include('components.form-group', ['type' => 'number', 'label' => 'Salon', 'name' => 'floor', 'id' => 'floor', 'value' => $property->floor] )
                </div>
                <div @class([''])>
                    @include('components.form-group', ['type' => 'number', 'label' => 'prix', 'name' => 'price', 'id' => 'price', 'value' => $property->price] )
                </div>
                <div @class(['grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3'])>
                    @include('components.form-group', ['label' => 'Ville', 'name' => 'city', 'id' => 'city', 'value' => $property->city] )
                    @include('components.form-group', ['label' => 'Adresse', 'name' => 'adress', 'id' => 'adress', 'value' => $property->adress] )
                    @include('components.form-group', ['label' => 'Code postal', 'name' => 'postal_code', 'id' => 'postal_code', 'value' => $property->postal_code] )
                </div>

                {{-- Sold item
                    <div @class(['form-group sm:grid-cols-1 md:justify-between md:gap-4 lg:w-md'])>
                        @include('components.field', ['type' => 'textarea', 'label' => 'Description', 'name' => 'description', 'id' => 'description', 'value' => $property->description] )
                    </div>
                --}}

                <div @class(['flex flex-col md:items-end gap-6'])>
                    <button @class(['w-auto text-center btn btn-secondary md:w-1/2'])>
                        @yield('title')
                    </button>
                </div>
            </form>

        </div>
    </div>

@endsection
{{--

    <div @class(['flex flex-col w-full md:grid grid-cols-1 mb-4'])>
        <label @class(['label']) for="surface">Surface(en m2)</label>
        <input @class(['form-control']) id="surface" name="surface" type="number" min="10" value="{{ __( @old('surface', $property->surface)) }}" placeholder="ex. 10">
        <p @class(['text-sm text-red'])>
            @error('surface')
            {{$message}}
            @enderror
        </p>
    </div>
    </div>

    <div @class(['form-group'])>
        <div @class(['flex flex-col w-full md:grid grid-cols-1 mb-4'])><!--sm:flex flex-wrap mb-4 sm:justify-between-->
            <label @class(['label']) for="rooms">Pièce(s)</label>
            <input @class(['form-control']) id="rooms" name="rooms" value="{{ __( @old('rooms', $property->rooms)) }}" type="number" placeholder="Combien de piece(s) ? 0 for studio">
            <p @class(['text-sm text-red'])>
                @error('rooms')
                {{$message}}
                @enderror
            </p>
        </div>
        <div @class(['flex flex-col w-full md:grid grid-cols-1 mb-4'])><!--flex flex-col sm:flex flex-wrap mb-4 sm:justify-between-->
            <label @class(['label']) for="bedrooms">Chambre(s)</label>
            <input @class(['form-control']) id="bedrooms" name="bedrooms" type="number"  value="{{ __( @old('bedrooms', $property->bedrooms)) }}" placeholder="ex. 1 or 0 for Studio">
            <p @class(['text-sm text-red'])>
                @error('bedrooms')
                {{$message}}
                @enderror
            </p>
        </div>
    </div>

    <div @class(['form-group md:grid grid-cols-2 md:justify-between md:gap-4 lg:w-md'])>
        <div @class(['flex flex-col w-full md:grid grid-cols-1 mb-4'])><!--sm:flex flex-wrap mb-4 sm:justify-between-->
            <label @class(['label']) for="floor">Salon(s)</label>
            <input @class(['form-control']) id="floor" name="floor" type="number" value="{{ __( @old('floor', $property->floor) ) }}" placeholder="Ex. 1 ou 0 for studio">
            <p @class(['text-sm text-red'])>
                @error('floor')
                {{$message}}
                @enderror
            </p>
        </div>
        <div @class(['flex flex-col w-full md:grid grid-cols-1 mb-4'])><!--flex flex-col sm:flex flex-wrap mb-4 sm:justify-between-->
            <label @class(['label']) for="price">Prix(s)</label>
            <input @class(['form-control']) id="price" name="price" value="{{ __( @old('price', $property->price)) }}" type="number" min="5" placeholder="ex. 170000">
            <p @class(['text-sm text-red'])>
                @error('price')
                {{$message}}
                @enderror
            </p>
        </div>
    </div>

    <div @class(['form-group md:grid grid-cols-3 md:justify-between md:gap-4 lg:w-md'])>
        <div @class(['flex flex-col w-full md:grid grid-cols-1 mb-4'])><!--sm:flex flex-wrap mb-4 sm:justify-between-->
            <label @class(['label']) for="city">Ville(s)</label>
            <input @class(['form-control']) id="city" name="city" value="{{ __(@old('city', $property->city)) }}" type="text" placeholder="Entrez la ville">
            <p @class(['text-sm text-red'])>
                @error('city')
                {{$message}}
                @enderror
            </p>
        </div>
        <div @class(['flex flex-col w-full md:grid grid-cols-1 mb-4'])><!--flex flex-col sm:flex flex-wrap mb-4 sm:justify-between-->
            <label @class(['label']) for="postal_code">Code postal</label>
            <input @class(['form-control']) id="postal_code" name="postal_code" value="{{ __(@old('postal_code', $property->postal_code)) }}" type="text"  placeholder="ex. BP V 93 ou 00225">
            <p @class(['text-sm text-red'])>
                @error('postal_code')
                {{$message}}
                @enderror
            </p>
        </div>
        <div @class(['flex flex-col w-full md:grid grid-cols-1 mb-4'])>
            <label @class(['label']) for="adress">Adresse</label>
            <input @class(['form-control']) id="adress" name="adress" value="{{ __(@old('adress', $property->adress)) }}" type="text"  placeholder="ex. 8 rue des oiseaux">
            <p @class(['text-sm text-red'])>
                @error('adress')
                {{$message}}
                @enderror
            </p>
        </div>
    </div>
--}}
