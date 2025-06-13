<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Property extends Model
{
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
        'sold',
        'real_estate_img_id'
    ];
    protected $guarded = [
        'id'
    ];

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
     * @return HasMany
     */
    public function RealEstateImgs():HasMany
    {
        return $this->hasMany(RealEstateImg::class);
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

}
