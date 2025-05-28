<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    //

    public function index(SearchPropertyRequest $searchPropertyRequest)
    {
        //Property::query()->paginate(20);
        $query = Property::query();

        if ($searchPropertyRequest->has('price') && !empty($searchPropertyRequest->input('price'))){

            $query->where('price', '<', $searchPropertyRequest->input('price'));
        }
        if ($searchPropertyRequest->has('surface') && !empty($searchPropertyRequest->input('surface'))){

            $query->where('surface', '>', $searchPropertyRequest->input('surface'));
        }

        if ( $searchPropertyRequest->has('rooms') && !empty( $searchPropertyRequest->input('rooms') ) ){

            $query->where('rooms', '<', $searchPropertyRequest->input('rooms'));
        }
        if ( $searchPropertyRequest->has('bedrooms') && !empty( $searchPropertyRequest->input('bedrooms') )){

            $query->where('bedrooms', '<', $searchPropertyRequest->input('bedrooms'));
        }
        if ($searchPropertyRequest->has('city') && !empty( $searchPropertyRequest->input('city') ) ){

            $query->where('city', 'like', '%'. $searchPropertyRequest->input('city') .'%' );
        }
        if ($searchPropertyRequest->has('title') && !empty($searchPropertyRequest->input('title')) ){

            $query->where('title', 'like', '%'. $searchPropertyRequest->input('title') .'%');
        }
        return view('entities_views.property.index', [
            'properties' => $query->paginate(20),
            'input' => $searchPropertyRequest->validated()
        ]);

    }

    public function show(string $slug, Property $property)
    {
        $property = Property::findOrFail($property->id);
        return view('entities_views.property.show', ['property' => $property ]);
    }

    public function search(SearchPropertyRequest $request)
    {
        if ($request->validated()){

            $data = match ($request) {
                $request->input('price') => Property::where(['price' => $request->input('price')]),
                $request->input('surface') => Property::where(['surface' => $request->input('surface')]),
                default => [],
            };
        }
        return $data;
    }
}
