<?php

namespace App\Models;

use App\Enums\BienImmobilierStatus;
use App\Enums\BienImmobiliersType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use \Illuminate\Http\Request;
use Illuminate\Support\Str;

class BienImmobilier extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'surface',
        'rooms',
        'bedrooms',
        'city',
        'adresse',
        'description',
        'price',
        'sold',
        'user_id'
    ];
    protected $guarded = ['id'];

    public function getCasts()
    {
        return $this->casts;
    }

    protected $casts = [
        'type' => BienImmobiliersType::class,
        'status' => BienImmobilierStatus::class
    ];

    /**
     * @param Request $request
     * @return \Illuminate\Container\Container|mixed|object
     */
    public function filterByType(Request $request)
    {
        $type = BienImmobiliersType::tryFrom($request->input('type'));

        $biens = BienImmobilier::when($type, function($query) use ($type){

            return $query->where('type', $type);

        })->with('specificities')->paginate(10);

        return view('admin.biens.index', compact($biens));
    }

    /**
     * @return string
     */
    public function getSlug():string
    {
        return Str::slug($this->title, '-');
    }

    /**
     * @return BelongsTo
     * have only one user
     */
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return BelongsToMany
     * Can have many Specificities
     */
    public function specificities():BelongsToMany
    {
        return $this->belongsToMany(Specificity::class);
    }

    /**
     * @return BelongsToMany
     */
    public function appartements():BelongsToMany
    {
        return $this->belongsToMany(Appartement::class, 'appartements', 'bien_id');
    }

    /**
     * @return BelongsToMany
     */
    public function maisons():BelongsToMany
    {
        return $this->belongsToMany(Maison::class, 'maisons', 'bien_id');
    }

    /**
     * @return BelongsToMany
     */
    public function terrains():BelongsToMany
    {
        return $this->belongsToMany(Terrain::class, 'terrains', 'bien_id');
    }

}
