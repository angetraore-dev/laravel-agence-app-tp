<?php

namespace App\Models;

use Database\Factories\TerrainFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Terrain extends Model
{
    //
    use HasFactory;
    protected static function newFactory(): TerrainFactory
    {
        return TerrainFactory::new();
    }

    protected $fillable = [
        'constructible',
        'zone',
        'property_id'
    ];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function property():BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

}
