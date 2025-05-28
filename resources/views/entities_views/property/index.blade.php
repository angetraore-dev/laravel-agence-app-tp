@extends('base')
@section('title', 'Les Annonces')
@section('content')

    <div @class(['w-full text-center my-4'])>
        <h3 @class(['font-bold uppercase'])> Toutes les annonces </h3>
    </div>

    <div @class(['space-y-12 p-2 mb-4'])>

        <form method="get" action="" @class([''])><!--grid grid-cols-1 md:grid-cols-2 mx-auto-->

            <div @class(['flex flex-col md:flex-row gap-2 sm:gap-4'])>
                <input name="price" type="number" placeholder="Budget max" @class(['w-full rounded-md h-12 p-4']) value="{{ $input['price'] ?? '' }}">
                <input name="surface" type="number" placeholder="Surface mininum" @class(['w-full rounded-md h-12 p-4']) value="{{ $input['surface'] ?? '' }}">
                <input name="rooms" type="number" placeholder="Nombre de pièce(s)" @class(['w-full rounded-md h-12 p-4']) value="{{ $input['rooms'] ?? '' }}">
                <input name="bedrooms" type="text" placeholder="Chambre(s)" @class(['w-full rounded-md h-12 p-4']) value="{{ $input['bedrooms'] ?? '' }}">
                <input name="city" placeholder="Ville" @class(['w-full rounded-md h-12 p-4'])  value="{{ $input['city'] ?? '' }}">
                <input name="title" placeholder="Mot-clé" @class(['w-full rounded-md h-12 p-4']) value="{{ $input['title'] ?? '' }}">

                <button @class(['btn btn-dark']) type="submit">rechercher</button>
                {{--sm:basis-64--}}
            </div>
            <div>
                @if($errors)
                    @foreach($errors as $error)
                        <p class="text-danger">
                            {{ $error->message }}
                        </p>
                    @endforeach
                @endif
            </div>

        </form>
    </div>
    <div @class(['grid grid-cols-1 gap-4 p-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-3'])>
        @foreach($properties as $property)
            @include('components.property.card', $property)
        @endforeach
    </div>
    <div @class([''])>
        {{ $properties->links() }}
    </div>
@endsection
