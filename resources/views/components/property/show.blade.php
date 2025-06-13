<div id="propertyShow" class="grid grid-cols-1 md:w-2/3 bg-white shadow-2xl rounded-lg p-2 my-4 mx-auto border-2 border-gray-300 hover:ring">
    <!--gap-4 w-sm md:w-auto md:mx-auto -->
    <div @class(['flex flex-col border-2 border-dark'])>
        @forelse( $property->RealEstateImgs as $img)
            <img width="40" height="40" alt="pic" src="{{ storage_path('public').'/'.$img->location }}" />
        @empty
            <img class="items-center text-center" src="#" alt="immobilier_img" />
        @endforelse
    </div>
    <div class="card-body p-2">
        <div class="">
            <div class="grid grid-cols-2">
                <div>
                    <h3 class="text-2xl md:text-xl font-bold uppercase">{{ $property->title }}</h3>
                    <h2 class="text-xl"> @if($property->rooms > 1) {{ $property->rooms }} pièce(s) @else studio @endif - {{ $property->surface }}m2</h2>
                </div>
                <div class="justify-between text-end">
                    <span @class(["inline-flex items-center rounded-md p-1 ring-1 ring-inset", ($property->sold) ? 'bg-gray-500 ring-gray-600/20' : 'bg-green-700 ring-green-600/20' ])></span>
                    <button id="contactPop" type="button" class="btn btn-sm text-sm text-center {{ $property->sold ? 'btn-secondary' : 'btn-primary cursor-pointer' }}" {{ $property->sold ? 'disabled=disabled' : ' ' }}>
                        Contacter
                    </button>
                    <div class="flex flex-col text-xs {{ $property->sold ? 'text-secondary' : 'text-success' }}">
                        Publié le: {{ date_format(new DateTime($property->createdAt), 'd-m-Y') }}
                    </div>
                </div>
            </div>
            <table>
                <tr>
                    <td>Surface habitable</td>
                    <td class="font-bold">
                        {{ $property->surface }}m2
                    </td>
                </tr>
                <tr>
                    <td class="italic">Pièce(s)</td>
                    <td class="font-bold">{{ ($property->rooms != 0) ? $property->rooms : 'studio'}}</td>
                </tr>
                @if($property->rooms != 0)
                    <tr>
                        <td>Chambre(s)</td>
                        <td class="font-bold">{{ $property->bedrooms }}</td>
                    </tr>
                @endif
                <tr>
                    <td>Etage</td>
                    <td class="font-bold">{{ ($property->floor != 0) ? $property->floor : 'Rez de chaussée'}}</td>
                </tr>

                <tr>
                    <td>Adresse</td>
                    <td class="font-bold">{{ $property->postal_code }}, {{ $property->city }}</td>
                </tr>
                <tr>
                    <td>Prix</td>
                    <td class="text-primary text-2xl">
                        {{ $property->getNumberFormatted($property->price, 'FCFA') }}
                    </td>
                </tr>
            </table>
            <div class="flex flex-wrap justify-between sm:gap-0">

                <div class="sm:w-3/4">
                    <p class="text-secondary font-bold">Description:</p>
                    <div class="p-2 border-2 border-gray-300">
                        {{ nl2br($property->description) }}
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab blanditiis, consectetur cumque doloremque earum est eveniet harum iusto nam odit perspiciatis provident quas quis quisquam recusandae reiciendis rerum voluptatum. Minima!
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium assumenda corporis dignissimos dolore ducimus eaque eum explicabo illum ipsam iste, magnam obcaecati omnis, quia quos repellat reprehenderit sunt unde velit.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab alias, cumque, dicta eos id in inventore itaque iusto maxime, numquam omnis optio placeat provident qui reiciendis sit unde vel velit!
                        </p>
                    </div>
                </div>
                <div class="sm:w-auto">
                    <p class="text-secondary font-bold">Comodités:</p>
                    <div class="p-2 border-2 border-gray-300">
                        <ul>
                            @forelse($property->options as $v)
                                <li>{{ $v->name }}</li>
                            @empty
                                <li>aucune option disponible</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div @class(['w-full gap-4 p-4 hidden']) id="contact_form">
        <h1 class="mb-4 text-center">Intéréssé par bien ? Laissé un message à l'annonceur :d</h1>

        <form id="form" action="{{ route('property.contact', ['property' => $property]) }}" method="post">
            @csrf
            <div @class(['grid grid-cols-1 sm:grid-cols-2 gap-4'])>
                @include('components.input', ['type' =>'text', 'name' =>'firstname', 'label' => 'Nom', 'class' =>'', 'div_group_class' =>'flex flex-col'])
                @include('components.input', ['type' =>'text', 'name' =>'lastname', 'label' => 'Prenoms', 'class' =>'', 'div_group_class' =>'flex flex-col'])
                @include('components.input', ['name' =>'phone', 'label' => 'Telephone', 'class' =>'', 'div_group_class' =>'flex flex-col'])
                @include('components.input', ['type' =>'email', 'name' =>'email', 'label' => 'Email', 'class' =>'', 'div_group_class' =>'flex flex-col'])
                @include('components.input', ['type' =>'textarea', 'name' =>'message', 'class' =>'', 'div_group_class' =>'flex flex-col'])

                <div class="hidden">
                    @include('components.input', ['value' => route('property.show', ['slug' => $property->getSlug(), 'property' => $property]), 'type' =>'hidden', 'name' =>'property', 'class' =>'', 'div_group_class' =>'flex flex-col'])
                </div>
            </div>
            <div class="flex flex-col text-center sm:w-1/2 sm:items-end">
                <button id="send_contact_form" class="btn btn-lg btn-primary" type="submit" name="send_contact_form">Envoyer</button>
            </div>
        </form>
    </div>
</div>
{{-- @include('components.modal') --}}
