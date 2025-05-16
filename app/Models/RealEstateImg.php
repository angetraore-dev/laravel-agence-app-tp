<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RealEstateImg extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'location',
        'property_id'
    ];
    protected $guarded = ['id'];

    public function property():BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
