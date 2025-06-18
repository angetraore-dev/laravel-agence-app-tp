<?php

namespace App\Models;

use Database\Factories\MaisonFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Maison extends Model
{
    //
    use HasFactory;
    protected static function newFactory(): MaisonFactory
    {
        return MaisonFactory::new();
    }

    protected $fillable = [
        'nb_etages',
        'jardin',
        'garage',
        'property_id'
    ];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function property():BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

}
