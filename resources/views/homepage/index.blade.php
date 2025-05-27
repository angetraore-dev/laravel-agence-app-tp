@extends('base')
@section('title', 'Accueil')
@section('content')

    <div @class(['w-full text-center my-4'])>
        <h3 @class(['font-bold uppercase'])> Derniers biens ajoutés</h3>
    </div>

    <div @class(['grid grid-cols-1 gap-4 p-4 md:grid-cols-2 lg:grid-cols-3'])>
        @foreach($properties as $property)
            @include('components.property.card', $property)
        @endforeach
    </div>
@endsection
@push('scripts')
    @vite('resources/js/views/partials/homepage.js')
@endpush

<!--
<div class(['md:grid grid-cols-2 xl:grid-cols-3 md:items-center'])>
<article class(['grid grid-cols-1 p-4 text-center uppercase shadow-lg rounded-md m-1'])>
    <h3 class(['font-bold my-2'])>Titre 1</h3>
    <p class="mb-2 text-xl md:text-lg md:text-start md:normal-case">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur consectetur ex excepturi laborum maxime nam nesciunt nihil nulla omnis quam quas quia similique sunt vel, voluptas? Accusamus asperiores ipsa magni.
        <br>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus consectetur cum est facere, in magni nulla quis sit veritatis vero. Architecto asperiores enim est facilis magnam nostrum nulla tempora voluptatibus.
    </p>
    <button type="button" class='w-lg p-4 bg-[#093dd5b1] text-white uppercase md:normal-case shadow-md rounded-lg hover:border-b-4 border-red-500 hover:bg-indigo-400 hover:text-red-700 hover:font-bold'>Click me !</button>
</article>
</div>
-->
