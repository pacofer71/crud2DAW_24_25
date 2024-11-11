<?php

namespace App\Utils;

class Datos
{
    public static function getPerfiles(): array
    {
        return ['Admin', 'Normal', 'Guest'];
    }
    public static function getTypeImages(): array
    {
        return [
            'image/gif',
            'image/png',
            'image/jpeg',
            'image/bmp',
            'image/webp'
        ];
    }
}
