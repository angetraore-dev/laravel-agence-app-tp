@extends('base')
@section('title', 'Les Annonces')
@section('content')

    <div @class(['w-full text-center my-4'])>
        <h3 @class(['font-bold uppercase'])> Toutes les annonces </h3>
    </div>

    <div @class(['space-y-12 p-2 mb-4'])>
        <form method="get" action="" @class(['flex flex-col sm:flex-row gap-2 sm:gap-4'])><!--grid grid-cols-1 md:grid-cols-2 mx-auto-->
            <input type="number" placeholder="Budget max" @class(['w-full rounded-md h-12 p-4'])  name="price" id="price">
            <button @class(['sm:basis-64 btn btn-dark']) type="submit">rechercher</button>
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
