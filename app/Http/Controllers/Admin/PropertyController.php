<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PropertyStatus;
use App\Enums\PropertyType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyRequest;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use JetBrains\PhpStorm\NoReturn;

class PropertyController extends Controller
{

    /**
     * @return View
     */
    public function index():view
    {
        $properties = Property::orderBy('created_at', 'desc')->paginate(5);
        //DB::table('properties')->paginate(10)
        return view('admin.properties.index', [
            'properties' => $properties
        ]);
    }

    /**
     * @return View
     */
    public function create():view
    {
        $property = new Property();
        $property->fill( [
            'title' => 'Go until the end',
            'type' => PropertyType::MAISON,
            'surface' => 14,
            'rooms' => 0,
            'bedrooms' => 0,
            'price' => 1,
            'description' => 'description',
            'city' => 'Abidjan',
            'adress' => '103 quartier banco residentiel, Yopougon millionnaire Abidjan',
            'status' => PropertyStatus::AVAIBLE,
            'user_id' => Auth::getUser() ?: 1,
            //'floor' => 0, 'postal_code' => '93BPV93 ABJ01'
        ]);
        $options = Option::all()->pluck( 'name', 'id');
        return view('admin.properties._form', ['property' => $property, 'options' => $options]);//create
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $propertyRequest)
    {
        $property = Property::create($propertyRequest->validated());
        $property->options()->sync($propertyRequest->validated('options'));
        return to_route('admin.property.index')->with('success', 'Bien immobilier enregistré');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        $options = Option::all()->pluck( 'name', 'id');
        return view('admin.properties._form', ['property' => $property, 'options' => $options]);
    }

    /**
     * Update the specified resource in storage.
     * Request $request
     */
    public function update(PropertyRequest $propertyRequest, Property $property):RedirectResponse
    {
        $property->update($propertyRequest->validated());
        $property->options()->sync($propertyRequest->validated('options'));
        return redirect()->route('admin.property.index')->with('success', 'Modifications enregistrées avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    #[NoReturn]
    public function destroy(Property $property):RedirectResponse
    {
        $property->delete();
        return to_route('admin.property.index')->with('success', 'Le bien a bien ete supprime');
    }
}

/**
 *     public function store(BienImmobilierRequest $bienImmobilierRequest)
{
switch ($bienImmobilierRequest->input('type')){
case 'maison':
if ( $bienImmobilierRequest->validate(MaisonRequest::rules()) ){

//Create BienImmobilier
$bienImmobilier = BienImmobilier::create($bienImmobilierRequest->validated());

//Synchronize Specificities
$bienImmobilier->specificities()->sync($bienImmobilierRequest->validated('specificities'));

//Save Maison details
Maison::create($bienImmobilierRequest->validated( MaisonRequest::rules(),[
'nb_etages' => $bienImmobilierRequest->input('nb_etages'),
'jardin' => $bienImmobilierRequest->input('jardin'),
'garage' => $bienImmobilierRequest->input('garage'),
'bien_immobilier_id' => $bienImmobilier->id
]));
}
break;
case 'appartement':
if ($bienImmobilierRequest->validate(AppartementRequest::rules())){

$bienImmobilier = BienImmobilier::create($bienImmobilierRequest->validated());
$bienImmobilier->specificities()->sync($bienImmobilierRequest->validated('specificities'));
Appartement::create($bienImmobilierRequest->validated(AppartementRequest::rules(),
[
'bien_immobilier_id' => $bienImmobilier->id,
'floor' => $bienImmobilierRequest->input('floor'),
'ascenceur' => $bienImmobilierRequest->input('ascenceur'),
'balcon' => $bienImmobilierRequest->input('balcon')
])
);
}
break;
case 'terrain':
if ($bienImmobilierRequest->validate(TerrainRequest::rules())){

$bienImmobilier = BienImmobilier::create($bienImmobilierRequest->validated());
$bienImmobilier->specificities()->sync($bienImmobilierRequest->validated('specificities'));
Terrain::create($bienImmobilierRequest->validated(TerrainRequest::rules(),
[
'bien_immobilier_id' => $bienImmobilier->id,
'constructible' => $bienImmobilierRequest->input('constructible'),
'zone' => $bienImmobilierRequest->input('zone')
])
);
}
break;
default: BienImmobilier::create($bienImmobilierRequest->validated());
}
return to_route('admin.bien.index')->with('success', 'Bien immobilier créé');

}

 */
