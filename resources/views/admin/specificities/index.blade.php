@extends('admin.admin')
@section('title', 'Liste des spécificités')

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
                    <a href="{{ route('admin.specificity.create') }}" @class(['text-sm text-white uppercase rounded-md bg-indigo-500 hover:bg-teal-500 p-2 md:grid grid-cols-1']) id="create">ajouter</a>
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
                @foreach($specificities as $specificity)
                    <tr @class(['border border-bottom-2'])>
                        <td @class(['border border-right-2'])>{{ $specificity->name }}</td>

                        <td @class(['flex items-center p-6 gap-4'])>
                            <a @class(['btn btn-primary w-auto text-sm font-small hover:btn-outline hover:text-blue-700 hover:border-blue-700']) href="{{route('admin.specificity.edit', $specificity) }}">edit</a>
                            <form @class(['w-auto flex-1']) action="{{route('admin.specificity.destroy', $specificity) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" @class(['btn btn-danger text-sm hover:btn-outline hover:text-red-700 hover:border-red-700'])>delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div @class(['mt-6 w-full p-4'])> {{ $specificities->links() }} </div>
        </div>
    </div>
@endsection
