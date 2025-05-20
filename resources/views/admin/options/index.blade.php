@extends('admin.admin')
@section('title', 'Tous les biens')

@section('content')

    <div @class(['flex h-dvh gap-1 md:gap-8'])>
        <div @class(['relative'])><!--row-span-3 border-2  md:bg-[#111] -->
            @include('admin.inc.menu')
        </div>

        <div id="content" @class(['grow md:ms-8'])><!-- border-2 border-indigo-500 md:forDivPlacePx -->
            <div @class(['grid grid-cols-2 bg-light-gray uppercase p-2 mb-4'])>
                <div @class([''])>
                    <h3 class="text-lg md:text-2xl text-start">@yield('title')</h3>
                </div>
                <div @class(['justify-self-end'])>
                    <a href="{{ route('admin.option.create') }}" @class(['text-sm text-white uppercase rounded-md bg-indigo-500 hover:bg-teal-500 p-2 md:grid grid-cols-1']) id="create">ajouter</a>
                </div>
            </div>

            <table @class(['table w-full text-center text-sm overflow-auto border-2 border-gray-400'])><!-- justify-items-between align-self-center-->
                <thead @class([''])>
                <tr @class(['border border-bottom-2'])>
                    <th @class(['border border-right-2'])>Noms</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($options as $option)
                    <tr @class(['border border-bottom-2'])>
                        <td @class(['border border-right-2'])>{{ $option->name }}</td>

                        <td @class(['flex items-center p-6 gap-4'])>
                            <a @class(['btn btn-primary w-auto text-sm font-small hover:btn-outline hover:text-blue-700 hover:border-blue-700']) href="{{route('admin.option.edit', $option) }}">edit</a>
                            <form @class(['w-auto flex-1']) action="{{route('admin.option.destroy', $option) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" @class(['btn btn-danger text-sm hover:btn-outline hover:text-red-700 hover:border-red-700'])>delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            <div @class(['mt-6 w-full p-4'])> {{ $options->links() }} </div>
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
