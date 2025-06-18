<?php

namespace App\Models;

use Database\Factories\OptionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    //
    use HasFactory;
    protected static function newFactory()
    {
        return OptionFactory::new();
    }

    protected $fillable = ['name'];
    protected $guarded = ['id'];
    public $timestamps = false;
}
