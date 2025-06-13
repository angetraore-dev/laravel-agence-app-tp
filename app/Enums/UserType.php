<?php
namespace App\Enums;

enum UserType: string {
    case PARTICULIER = 'particulier';
    case PRO = 'pro';
    case ACQUEREUR= 'acquereur';

    public function label():string
    {
        return match ($this){
            UserType::PARTICULIER => 'Particulier',
            UserType::PRO => 'Pro',
            UserType::ACQUEREUR => 'Acquereur'
        };
    }

    public static function isFinalized($value):bool
    {
        return in_array($value, [self::PARTICULIER, self::PRO, self::ACQUEREUR]);
    }

}
