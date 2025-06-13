<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maison extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'bien_id',
        'nb_etage',
        'jardin',
        'garage'
    ];

    public $timestamps = false;

}
