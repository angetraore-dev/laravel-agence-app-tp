<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terrain extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'constructible',
        'zone',
        'bien_immobilier_id'
    ];
    protected $guarded = ['id'];

}
