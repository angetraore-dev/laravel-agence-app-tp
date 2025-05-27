@extends('base')
@section('title', $property->getSlug())
@section('content')

    <div @class(['grid grid-cols-1 gap-4 p-4 md:w-1/2 lg:w-2/3 md:mx-auto '])>
        @include('components.property.card', $property)
    </div>
@endsection
