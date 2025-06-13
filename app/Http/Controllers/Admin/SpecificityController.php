<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SpecificityRequest;
use App\Models\Specificity;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SpecificityController extends Controller
{

    public function index():view
    {
        return view('admin.specificities.index', [
            'specificities' => Specificity::paginate(10)
        ]);
    }

    public function create():view
    {
        $specificity = new Specificity();
        $specificity->fill(['name' => 'access_mobilité_réduite']);
        return view('admin.specificities._form', ['specificity' => $specificity]);
    }

    public function store(SpecificityRequest $specificityRequest): RedirectResponse
    {
        Specificity::create($specificityRequest->validated());
        return to_route('admin.specificity.index')->with('success', 'La Spécificité a été ajoutee avec succes !');
    }

    public function edit(Specificity $specificity):mixed
    {
        return view('admin.specificities._form', ['specificity' => $specificity]);
    }

    public function update(Specificity $specificity, SpecificityRequest $specificityRequest): RedirectResponse
    {
        $specificity->update($specificityRequest->validated());
        return redirect()->route('admin.specificity.index')->with('success', 'L\'item a été modifié avec succes !!');
    }

    public function destroy(Specificity $specificity): RedirectResponse
    {
        $specificity->delete();
        return to_route('admin.specificity.index')->with('success', 'L\'item a bien été supprimé !');

    }
}
