<?php

namespace App\Models;

use App\Enums\PropertyStatus;
use App\Enums\PropertyType;
use App\Enums\TerrainZone;
use Database\Factories\PropertyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use LaravelLang\Publisher\Concerns\Has;

class Property extends Model
{
    use HasFactory;
    protected static function newFactory(): PropertyFactory
    {
        return PropertyFactory::new();
    }

    protected $fillable = [
        'title',
        'type',
        'surface',
        'rooms',
        'bedrooms',
        'price',
        'city',
        'adress',
        'description',
        'status',
        //'user_id'
        //, floor, postal_code, sold
    ];
    protected $guarded = ['id'];
    protected $casts = [
        'type' => PropertyType::class,
        'status' => PropertyStatus::class,
        'zone' => TerrainZone::class
    ];

    /**
     * @return array|string[]
     */
    public function getCasts()
    {
        return $this->casts;
    }

    /**
     * @return string
     */
    public function getSlug():string
    {
        return Str::slug($this->title, '-');
    }

    /**
     * @return BelongsToMany
     */
    public function options():BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }

    /**
     * @return HasOne
     */
    public function maison():HasOne
    {
        return $this->hasOne(Maison::class);
    }

    /**
     * @return HasOne
     */
    public function appartement():HasOne
    {
        return $this->hasOne(Appartement::class);
    }

    /**
     * @return HasOne
     */
    public function terrain():HasOne
    {
        return $this->hasOne(Terrain::class);
    }

    /**
     * @param $value
     * @param $currency
     * @return string
     */
    public function getNumberFormatted($value, $currency)
    {
        return number_format($value, thousands_separator: '.') .' '.$currency;
    }

    public function filterByType(Request $request)
    {
        $type = PropertyType::tryFrom($request->input('type'));

        $properties = Property::when($type, function($query) use ($type){

            return $query->where('type', $type);

        })->with('options')->paginate(10);

        return view('admin.properties.index', ['properties' => $properties]);
    }

///**
//     * @return HasOne
//     */
//    public function users():HasOne
//    {
//        return $this->hasOne(User::class);
//    }
}
