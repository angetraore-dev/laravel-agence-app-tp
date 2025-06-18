<?php

namespace App\Enums;

enum PropertyStatus:string
{
    case COMPLETE = 'complete';
    case AVAIBLE = 'avaible';
    case PROCESSING = 'processing';

    public function label():string
    {
        return match ($this){
            self::COMPLETE => 'Fulfilled',
            self::AVAIBLE => 'Avaible',
            self::PROCESSING => 'In progress'
        };
    }

    public function color():string
    {
        return match ($this){
            self::COMPLETE => 'blue',
            self::AVAIBLE => 'green',
            self::PROCESSING => 'yellow'
        };
    }

    public static function isFinalized($value):bool
    {
        return in_array($value, [self::PROCESSING, self::AVAIBLE, self::COMPLETE]);
    }

}
