@extends('base')
@section('title', $property->getSlug())
@section('content')

    <div @class([''])><!-- p-4 md:w-sm lg:w-md md:mx-auto-->
        @include('components.property.show', $property)
    </div>
@endsection
@push('scripts')
    @vite('resources/js/views/components/property/show.js')
@endpush
