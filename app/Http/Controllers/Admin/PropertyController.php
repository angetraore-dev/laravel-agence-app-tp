<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyRequest;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\RedirectResponse;
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
            'title' => 'le bien immobilier',
            'description' => 'description',
            'surface' => 14,
            'rooms' => 1,
            'bedrooms' => 0,
            'floor' => 0,
            'price' => 1,
            'city' => 'Abidjan',
            'adress' => '103 quartier millionnaire, Yopougon Abidjan',
            'postal_code' => '93BPV93 ABJ01'
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
