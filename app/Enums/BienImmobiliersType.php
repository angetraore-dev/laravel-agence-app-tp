<?php

namespace App\Enums;

enum BienImmobiliersType:string
{
    case MAISON = 'maison';
    case APPARTEMENT = 'appartement';
    case TERRAIN = 'terrain';

    public function label():string
    {
        return match($this){
            self::MAISON => 'Maison',
            self::APPARTEMENT => 'Appartement',
            self::TERRAIN => 'Terrain'
        };
    }

    public function isFinalized():bool
    {
        return in_array($this, [self::MAISON, self::APPARTEMENT, self::TERRAIN]);
    }

}
