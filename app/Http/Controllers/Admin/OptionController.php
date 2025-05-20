<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionRequest;
use App\Models\Option;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use JetBrains\PhpStorm\NoReturn;

class OptionController extends Controller
{

    /**
     * @return View
     */
    public function index():view
    {
        return view('admin.options.index', [
            'options' => Option::paginate(5)
        ]);
    }

    /**
     * @return View
     */
    public function create():view
    {
        $option = new Option();
        $option->fill( [
            'name' => 'acces mobilite reduite',
        ]);
        return view('admin.options._form', ['option' => $option]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionRequest $optionRequest): RedirectResponse
    {
        Option::create($optionRequest->validated());
        return to_route('admin.option.index')->with('success', 'L\' option a bien été enregistré');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option): mixed
    {
        return view('admin.options._form', ['option' => $option]);
    }

    /**
     * Update the specified resource in storage.
     * Request $request
     */
    public function update(OptionRequest $optionRequest, Option $option):RedirectResponse
    {
        $option->update($optionRequest->validated());
        return redirect()->route('admin.option.index')->with('success', 'Modifications enregistrées avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    #[NoReturn]
    public function destroy(Option $option):RedirectResponse
    {
        //RealEstateImg::destroy($property);
        $option->delete();
        return to_route('admin.option.index')->with('success', 'L\'option a bien été supprimé');
        //
    }
}
