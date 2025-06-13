@include('components.form-group', ['type' => 'text', 'name' => 'zone', 'label' => 'Situation geographique', 'value' => $bien_terrain->exists ? $bien_terrain->terrains()->zone : null])

<div @class(['flex flex-wrap justify-between sm:col-span-2'])>
    @include('components.checkbox', ['class' => 'w-full', 'name' => 'constructible', 'value' => $bien_terrain->exists ? $bien_terrain->terrains()->constructible : false ])
</div>

