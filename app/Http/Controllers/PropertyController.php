<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\SearchPropertyRequest;
use App\Mail\ContactMail;
use App\Models\Property;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Mail;

//use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * @param SearchPropertyRequest $searchPropertyRequest
     * @return Container|mixed|object
     */
    public function index(SearchPropertyRequest $searchPropertyRequest): mixed
    {
        //Property::query()->paginate(20);
        $query = Property::query()->with('options');

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

    /**
     * @param string $slug
     * @param Property $property
     * @return Container|mixed|object
     */
    public function show(string $slug, Property $property): mixed
    {
        $expectedSlug = $property->getSlug();

        if($slug != $expectedSlug){

            return to_route('property.index');
            //['slug' => $expectedSlug, 'property' => $property ]
        }
        //$property = Property::findOrFail($property->id);
        return view('entities_views.property.show', ['property' => $property ]);
    }

    public function contact(Property $property, ContactRequest $contactRequest)
    {
        Mail::send(new ContactMail($property, $contactRequest->validated()));
        return back()->with('success', 'Message bien envoye');

    }


}
