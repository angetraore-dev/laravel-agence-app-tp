<div id="propertyShow" class="grid grid-cols-1 my-4 mx-auto md:w-2/3 border-2 border-gray-300 hover:ring p-2 shadow-2xl rounded-lg bg-white">
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
            <h2 class="text-xl">{{ $property->bedrooms ?? 'studio'}} chambre(s)</h2>
            <h2 class="text-xl">{{ $property->city }} - {{ $property->postal_code }}</h2>

            <div @class([''])>
                <p class="text-secondary font-bold">prix:</p>
                <div class="text-primary text-2xl">
                    {{ $property->getNumberFormatted($property->price, 'FCFA') }}
                </div>
            </div>
            <div class="flex flex-wrap justify-between sm:gap-0">

                <div class="sm:w-3/4">
                    <p class="text-secondary font-bold">Description:</p>
                    <div class="p-2 border-2 border-gray-300">
                        {{ $property->description }}
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
</div>
<!-- Modal Form -->
@include('components.modal')
