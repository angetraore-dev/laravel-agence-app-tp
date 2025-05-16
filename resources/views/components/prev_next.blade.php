@php
$prev ??= 'prev';
$next ??= 'next';
@endphp
<div class="inline-flex">
    <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
        {{ old($prev, '') }}
    </button>
    <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r">
        {{ old($next, '') }}
    </button>
</div>
