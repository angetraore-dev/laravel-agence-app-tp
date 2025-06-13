<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'adresse',
        'telephone',
        'type',//Particulier, Acquereur or Pro
        'statut'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'type' => UserType::class
        ];
    }

    /**
     * @return BelongsTo
     * One user or not can have one ProfilPro
     */
    public function profilPro():BelongsTo
    {
        return $this->belongsTo(ProfilPro::class);
    }

    /**
     * @return BelongsToMany
     * One user can create many bienImmobiliers
     */
    public function bienImmobiliers():BelongsToMany
    {
        return $this->belongsToMany(BienImmobilier::class);
    }
}
