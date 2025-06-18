<?php

namespace App\Enums;

enum TerrainZone:string
{
    case AGRICOLE = 'agricole';
    case URBAINE = 'urbaine';

    public static function isFinalized($value):bool
    {
        return in_array($value, [self::AGRICOLE, self::URBAINE]);
    }
}
