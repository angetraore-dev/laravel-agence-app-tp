<?php

namespace App\Models;

use Database\Factories\ProfilProFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfilPro extends Model
{
    use HasFactory;
    protected static function newFactory(): ProfilProFactory
    {
        return ProfilProFactory::new();
    }

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

}
