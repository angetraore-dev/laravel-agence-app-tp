<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyRequest;
use App\Models\Property;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PropertyController extends Controller
{

    /**
     * @return View
     */
    public function index():view
    {
        //$properties = Property::all()->paginate(10);
        //DB::table('properties')->paginate(10)
        return view('admin.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * @return View
     */
    public function create():view
    {
        $property = new Property();
        return view('admin.properties._form', ['property' => $property]);//create
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $propertyRequest)
    {
        Property::create($propertyRequest->validated());
        return redirect()->route('admin.property.index')->with('success', 'Bien immobilier enregistré');
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        //$property = Property::findorFail($id);
        return view('admin.properties._form', ['property' => $property]);//create
    }

    /**
     * Update the specified resource in storage.
     * Request $request
     */
    public function update(PropertyRequest $propertyRequest, Property $property):RedirectResponse
    {
        $property->update($propertyRequest->validated());
        return redirect()->route('admin.property.index')->with('success', 'Modifications enregistrées avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property):RedirectResponse
    {
        $property->delete();
        return redirect()->route('admin.property.index')->with('success', 'Le bien a bien ete supprime');
        //
    }
}
