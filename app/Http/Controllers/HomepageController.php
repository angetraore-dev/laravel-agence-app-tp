<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $properties = Property::orderBy('created_at', 'desc')->where(['sold' => false])->limit(5)->get();
        return view('homepage.index', ['properties' => $properties]);
    }
}
