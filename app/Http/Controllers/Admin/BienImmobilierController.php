<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BienImmobilierStatus;
use App\Enums\BienImmobiliersType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BienImmobilierRequest;
use App\Http\Requests\Admin\MaisonRequest;
use App\Models\Appartement;
use App\Models\BienImmobilier;
use App\Models\Maison;
use App\Models\Specificity;
use App\Models\Terrain;
use Illuminate\Support\Facades\Auth;

class BienImmobilierController extends Controller
{
    //

    public function index()
    {
        $biens = BienImmobilier::orderBy('created_at', 'desc')->with('user')->paginate(10);
        return view('admin.biens.index', ['biens' => $biens]);
    }

    public function create()
    {
        $bien = new BienImmobilier();
        $bien->fill([
            'type' => BienImmobiliersType::TERRAIN,
            'city' => 'Abidjan',
            'price' => 100000000,
            'surface' => 680,
            'rooms' => 3,
            'adresse' => '8 rue des oiseaux marcory residentiel',
            'bedrooms' => 2,
            'description' => 'Hey pappy !!',
            'sold' => BienImmobilierStatus::AVAIBLE,
            'user_id' => Auth::getUser() ?: 1
        ]);
        $specificities = Specificity::all()->pluck('name', 'id');
        return view('admin.biens.create', ['bien' => $bien, 'specificities' => $specificities ]);//compact($bien) <=String or array of string
    }

    public function edit(BienImmobilier $bienImmobilier)
    {
        return view('admin.biens.create', ['bien' => $bienImmobilier, 'specificities' => Specificity::all()->pluck('name', 'id')]);
    }

    public function store(BienImmobilierRequest $bienImmobilierRequest)
    {
        $bienImmobilier = BienImmobilier::create($bienImmobilierRequest->validated());
        $bienImmobilier->specificities()->sync($bienImmobilierRequest->validated('specificities'));

        if ($bienImmobilierRequest->input('type') == 'maison'){

            $bienImmobilier->maisons()->sync($bienImmobilierRequest->validated(['bien_id' => $bienImmobilier->id, 'nb_etages','jardin', 'garage']));

        }elseif ($bienImmobilierRequest->input('type') == 'appartement'){

            $bienImmobilier->appartements()->sync($bienImmobilierRequest->validated([
                'bien_id' => $bienImmobilier->id, 'floor', 'ascenceur', 'balcon']));

        }else{
            //terrain
            $bienImmobilier->terrains()->sync($bienImmobilierRequest->validated([
                'bien_id' => $bienImmobilier->id, 'constructible', 'zone']));

        }
        return to_route('admin.bien.index')->with('success', 'Bien immobilier créé');

    }
}
