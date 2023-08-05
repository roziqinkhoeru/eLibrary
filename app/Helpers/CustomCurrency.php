<?php

namespace App\Helpers;

/**
 * Format response.
 */
class CustomCurrency
{
    public static function format_idr($param)
    {
        return 'Rp. ' . number_format($param, 0, ',', '.');
    }
}
