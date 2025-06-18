@include('components.form-group', ['type' => 'number', 'name' => 'nb_etages',
    'label' => 'Nombre étage(s)',
    'value' => $bien_maison->exists ? $bien_maison->maisons()->nb_etages : 0 ])
<div @class(['flex flex-wrap justify-between sm:col-span-2'])>
    @include('components.checkbox', ['class' => 'w-full', 'name' => 'jardin', 'value' => $bien_maison->exists ? $bien_maison->maisons()->jardin : 0 ])
    @include('components.checkbox', ['class' => 'w-full', 'name' => 'garage', 'value' => $bien_maison->exists ? $bien_maison->maisons()->garage : 0 ])
</div>
