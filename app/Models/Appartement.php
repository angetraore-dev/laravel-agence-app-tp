<?php

namespace App\Models;

use Database\Factories\AppartementFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appartement extends Model
{
    use HasFactory;
    protected static function newFactory(): AppartementFactory
    {
        return AppartementFactory::new();
    }

    protected $fillable = [
        'floor',
        'ascenceur',
        'balcon',
        'property_id'
    ];
    protected $guarded =['id'];
    public $timestamps = false;

    public function property():BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
