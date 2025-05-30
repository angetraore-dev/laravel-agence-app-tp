{{--https://flowbite.com/docs/components/card/#default-card
max-w-sm
--}}
<div id="propertyCard" data-id="{{ $property->id }}" data-href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}" class="space-4 w-sm bg-white rounded-lg shadow-sm rounded-md cursor-pointer hover:ring border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div @class(['flex flex-col border-2 border-dark'])>
        <img class="items-center text-center" src="#" alt="immobilier_img" />
    </div>
    <div class="card-body p-5">

        <h5 class="mb-2 text-2xl text-center font-bold tracking-tight text-gray-900 dark:text-white">{{ $property->title }}</h5>
        <div class="flex justify-end mb-2">

            <div class="w-24 text-dark text-sm p-2 rounded-md shadow-md bg-gray-200 border-2 border-info">
                <p>Surface: {{ $property->surface }} m2</p>
                <p>Ville: {{$property->city }}</p>
            </div>
        </div>
        <div class="flex justify-between gap-4 mb-4">
            <p class="text-primary inline-flex items-center text-md font-medium">
                {{ number_format($property->price, thousands_separator: ' ') }} Fcfa
            </p>

            <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}" class="inline-flex items-end px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Détail
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>

        <div @class(['w-full items-end'])><!--flex flex-row w-full justify-end-->
            <p @class(['flex text-xs ', ($property->sold) ? 'text-secondary' : 'text-success'])>
                {{ $property->sold ? 'vendu' : 'disponible' }}
            </p>
            <span @class(['flex p-1.5 rounded-sm', ($property->sold) ? 'bg-gray-300 secondary' : 'bg-green-300 success'])></span>

        </div>
    </div>
</div>

