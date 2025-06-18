@include('components.form-group', ['type' => 'number', 'name' => 'floor', 'label' => 'Niveau', 'value' => $bien_appart->appartements()->floor ])
<div @class(['flex flex-wrap justify-between sm:col-span-2'])>
    @include('components.checkbox', ['class' => 'w-full', 'name' => 'ascenceur', 'value' => $bien_appart->appartements()->ascenceur ])
    @include('components.checkbox', ['class' => 'w-full', 'name' => 'balcon', 'value' => $bien_appart->appartements()->balcon ])
</div>
