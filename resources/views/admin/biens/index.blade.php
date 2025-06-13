@extends('admin.admin')
@section('title', 'Index des biens immobiliers')

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
                    <a href="{{ route('admin.bien.create') }}" @class(['text-sm text-white uppercase rounded-md bg-indigo-500 hover:bg-teal-500 p-2 md:grid grid-cols-1']) id="create">
                        ajouter un bien
                    </a>
                </div>
            </div>

            <table @class(['table w-full text-center text-sm overflow-auto border-2 border-gray-400'])><!-- justify-items-between align-self-center-->
                <thead @class([''])>
                <tr @class(['border border-bottom-2'])>
                    <th @class(['border border-right-2'])>Titre</th>
                    <th @class(['border border-right-2'])>Details</th>
                    <th @class(['border border-right-2'])>images</th>
                    <th @class(['border border-right-2'])>Spécificités?</th>
                    <th @class(['border border-right-2'])>Créé par</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($biens as $bien)
                    <tr>
                        <td>{{ $bien->title }}</td>
                        <td>
                            <table>
                                <tr>
                                    <th>Type</th>
                                    <td>{{ $bien->type }}</td>
                                </tr>
                                <tr>
                                    <th>Surface</th>
                                    <td>{{ $bien->surface }}m2</td>
                                </tr>
                                <tr>
                                    <th>Piece(s)</th>
                                    <td>{{ $bien->rooms }}piece(s)</td>
                                </tr>
                                <tr>
                                    <th>Chambre?studio</th>
                                    <td>{{ $bien->bedrooms }}chambre(s)</td>
                                </tr>
                                <tr>
                                    <th>description</th>
                                    <td>{{ $bien->description }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $bien->sold }}</td>
                                </tr>
                                <tr>
                                    <th>Prix</th>
                                    <td>{{ $bien->price }}</td>
                                </tr>
                            </table>
                        </td>
                        <td>images</td>
                        <td>
                            <ul>
                            @forelse($bien->specificities as $spec)
                            <li>{{ $spec->name }}</li>
                            @empty
                            <li>aucune option</li>
                            @endforelse
                            </ul>
                        </td>
                        <td>Date</td>

                    </tr>
                @empty
                    <tr><td>Empty</td></tr>
                @endforelse

                </tbody>

            </table>
            <div @class(['mt-6 w-full p-4'])> {{ $biens->links() }} </div>
        </div>
    </div>

@endsection
{{--
@push('scripts')
        @vite(['resources/js/views/admin/biens/index.js'])
    @endpush
    --}}
