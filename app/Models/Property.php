<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'surface',
        'rooms',
        'bedrooms',
        'floor',
        'price',
        'city',
        'adress',
        'postal_code',
        'sold'
    ];
    protected $guarded = [
        'id'
    ];

    public function RealEstateImgs():HasMany
    {
        return $this->hasMany(RealEstateImg::class);
    }

}
