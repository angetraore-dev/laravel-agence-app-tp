@extends('admin.admin')
@section('title', 'Tous les biens')

@section('content')

    <div @class(['flex h-dvh gap-1 md:gap-8'])>
        <div @class(['relative'])><!--row-span-3 border-2  md:bg-[#111] -->
            @include('admin.inc.menu')
        </div>

        <div id="content" @class(['grow border-2 border-indigo-500 md:ms-8'])><!--md:forDivPlacePx -->
            <div @class(['grid grid-cols-2 bg-light-gray uppercase p-2 mb-4'])>
                <div @class([''])>
                    <h3 class="text-lg md:text-2xl text-start">@yield('title')</h3>
                </div>
                <div @class(['justify-self-end'])>
                    <a href="{{ route('admin.property.create') }}" @class(['text-sm text-white uppercase rounded-md bg-indigo-500 hover:bg-teal-500 p-2 md:grid grid-cols-1']) id="create">ajouter</a>
                </div>
            </div>

            <table @class(['table w-full text-center text-sm overflow-auto border-2 border-gray-400'])><!-- justify-items-between align-self-center-->
                <thead @class([''])>
                <tr @class(['border border-bottom-2'])>
                    <th @class(['border border-right-2'])>Titre</th>
                    <th @class(['border border-right-2'])>Surface</th>
                    <th @class(['border border-right-2'])>Piece(s)</th>
                    <th @class(['border border-right-2'])>Chambre(s)</th>
                    <th @class(['border border-right-2'])>Salon</th>
                    <th @class(['border border-right-2'])>Ville</th>
                    <th @class(['border border-right-2'])>Code postal</th>
                    <th @class(['border border-right-2'])>Adresse</th>
                    <th @class(['border border-right-2'])>Description</th>
                    <th @class(['border border-right-2'])>Prix</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($properties as $property)
                    <tr @class(['border border-bottom-2'])>
                        <td @class(['border border-right-2'])>{{ $property->title }}</td>
                        <td @class(['border border-right-2'])>{{ $property->surface }}m2</td>
                        <td @class(['border border-right-2'])>{{ $property->rooms }}</td>
                        <td @class(['border border-right-2'])>{{ $property->bedrooms }}</td>
                        <td @class(['border border-right-2'])>{{ $property->floor }}</td>
                        <td @class(['border border-right-2'])>{{ $property->city }}</td>
                        <td @class(['border border-right-2'])>{{ $property->postal_code }}</td>
                        <td @class(['border border-right-2'])>{{ $property->adress }}</td>
                        <td @class(['border border-right-2'])>{{ $property->description }}</td>
                        <td @class(['border border-right-2'])>{{ number_format($property->price, thousands_separator: ' ') }}</td>
                        <td @class(['grid grid-cols-2 justify-between'])>
                            <a href="{{route('admin.property.edit', $property) }}" @class(['text-sm font-small hover:text-blue-400'])>edit</a>
                            <form @class(['']) action="{{route('admin.property.destroy', $property) }}" method="post">
                                @csrf
                                @method( $property->exists ? 'DELETE' : 'POST')
                                <button type="submit" @class(['btn btn-dark p-1 text-sm font-small hover:text-red-700'])>delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            <div>

                {{ $properties->links() }}

            </div>
        </div>
    </div>






@endsection

<!--
push('scripts')
    @vite('resources/js/views/admin/index.js')
endpush

<div @class([''])>
        <div
            class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
            <table class="w-full text-left table-auto min-w-max">
                <thead>
                <tr>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-500">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                            Name
                        </p>
                    </th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-500">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                            Job
                        </p>
                    </th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-500">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                            Employed
                        </p>
                    </th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70"></p>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            John Michael
                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            Manager
                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            23/04/18
                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <a href="#" class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                            Edit
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            Alexa Liras
                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            Developer
                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            23/04/18
                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <a href="#" class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                            Edit
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            Laurent Perrier
                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            Executive
                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            19/09/17
                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <a href="#" class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                            Edit
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            Michael Levi
                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            Developer
                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            24/12/08
                        </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <a href="#" class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                            Edit
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="p-4">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            Richard Gran
                        </p>
                    </td>
                    <td class="p-4">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            Manager
                        </p>
                    </td>
                    <td class="p-4">
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                            04/10/21
                        </p>
                    </td>
                    <td class="p-4">
                        <a href="#" class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                            Edit
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
-->
