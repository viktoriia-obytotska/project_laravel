<?php

namespace App\Helpers;

class TempHelper
{
    private const DIFFERECE_KELVIN_TO_CELCIUS = 273;

    public static function convertKelvinToCelcius (float $temp)
    {
        return $temp - self::DIFFERECE_KELVIN_TO_CELCIUS;
    }

}
