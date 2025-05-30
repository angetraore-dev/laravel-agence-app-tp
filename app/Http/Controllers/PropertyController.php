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

        if ( $price = $searchPropertyRequest->validated('price') ){

            $query->where('price', '<', $price);
        }
        if ( $surface = $searchPropertyRequest->validated('surface') ){

            $query->where('surface', '>', $surface);
        }

        if ( $rooms = $searchPropertyRequest->validated('rooms') ){

            $query->where('rooms', '<', $rooms);
        }
        if ( $bedrooms = $searchPropertyRequest->validated('bedrooms') ){

            $query->where('bedrooms', '<', $bedrooms);
        }
        if ( $city = $searchPropertyRequest->validated('city') ){

            $query->where('city', 'like', '%'. $city .'%' );
        }
        if ( $title = $searchPropertyRequest->validated('title') ){

            $query->where('title', 'like', '%'. $title .'%');
        }

        return view('entities_views.property.index', [

            'properties' => $query->paginate(20),

            'input' => $searchPropertyRequest->validated()
        ]);

    }

    public function show(string $slug, Property $property)
    {
        $expectedSlug = $property->getSlug();

        if($slug != $expectedSlug){

            return to_route('property.index');
            //['slug' => $expectedSlug, 'property' => $property ]
        }
        //$property = Property::findOrFail($property->id);
        return view('entities_views.property.show', ['property' => $property ]);
    }


}
