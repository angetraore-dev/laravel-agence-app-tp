{{--https://flowbite.com/docs/components/card/#default-card
max-w-sm
--}}
<div class="w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="rounded-t-lg" src="#" alt="immobilier_img" />
    </a>
    <div class="card-body p-5">
        <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $property->title }}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            {{$property->surface }}m2 {{ $property->city .' '. $property->postal_code }}<br>{{$property->description}}
        </p>
        <p class="text-primary inline-flex items-center text-md font-medium">
            {{ number_format($property->price, thousands_separator: ' ') }} Fcfa
        </p>

        <div @class(['flex flex-row w-full justify-end'])>
            <span @class(['font-bold text-sm', ($property->sold) ? 'secondary' : 'success'])>
                {{ $property->sold ? 'vendu' : 'disponible' }}
            </span>
        </div>
    </div>
</div>
{{--
<a href="{{ route('property.show', ['property' => $property, 'slug' => $property->getSlug()]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Détail
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
--}}
