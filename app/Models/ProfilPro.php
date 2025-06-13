<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProfilPro extends Model
{
    //
    use HasFactory;

    protected $fillable = [
      'agence',
      'rccm',
      'cc',
      'abonnement',
      'user_id'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsToMany
     *
     */
    public function bienImmobiliers():BelongsToMany
    {
        return $this->belongsToMany(BienImmobilier::class);
    }

}
