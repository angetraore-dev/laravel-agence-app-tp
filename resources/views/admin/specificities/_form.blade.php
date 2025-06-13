@extends('admin.admin')
@section('title', ($specificity->exists) ? 'Editer' : 'Ajouter Une spécificité')

@section('content')
    <div @class(['flex h-dvh gap-1'])>
        <div @class(['w-auto'])>
            @include('admin.inc.menu')
        </div>

        <div id="content" @class(['w-auto grow p-4'])>

            <h3 @class(['my-5 text-center text-lg font-medium text-orange-500'])>@yield('title')</h3>
            <form @class(['form h-min-dvh rounded-lg text-lg shadow-lg w-auto md:mx-auto lg:w-2/3']) method="post" action="{{ ($specificity->exists) ? route('admin.specificity.update', $specificity) : route('admin.specificity.store') }}" name="specificity">
                @csrf
                @method($specificity->exists ? 'PATCH' : 'POST')

                <div @class([''])>
                    @include('components.form-group', ['type' => 'text', 'label' => 'Specificité', 'name' => 'name', 'id' => 'name', 'value' => $specificity->name] )
                </div>
                <div @class(['flex flex-col md:items-end gap-6'])>
                    <button @class(['w-auto text-center btn btn-secondary md:w-1/2'])>
                        @yield('title')
                    </button>
                </div>
            </form>

        </div>
    </div>

@endsection
