<?php

namespace App\Service;


class NumberFormatter
{
    public function format(float $number): ?string
    {
        if ($number >= 999500 && $number < 1000000) {
            $result = '1.00M';
        } else if ($number >= 999500) {
            $result = round(($number/1000000), 2);
            $result .= 'M';
        }

        return $result;
    }
}