@include('components.form-group', ['type' => 'number', 'name' => 'floor', 'label' => 'Niveau', 'value' => $bien_appart->exists ? $bien_appart->appartements()->floor : null])
<div @class(['flex flex-wrap justify-between sm:col-span-2'])>
    @include('components.checkbox', ['class' => 'w-full', 'name' => 'ascenceur', 'value' => $bien_appart->exists ? $bien_appart->appartements()->ascenceur : false ])
    @include('components.checkbox', ['class' => 'w-full', 'name' => 'balcon', 'value' => $bien_appart->exists ? $bien_appart->appartements()->balcon : false ])
</div>
