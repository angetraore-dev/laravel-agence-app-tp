<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    //
    public function index()
    {
        return view('homepage.index', ['properties' => Property::orderBy('created_at', 'desc')->paginate(10)]);
    }
}
