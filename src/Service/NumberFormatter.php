<?php

namespace App\Service;


class NumberFormatter
{
    /**
     * @param float $number
     * @return null|string
     */
    public function format(float $number): ?string
    {
        $result = null;
        $negativeValue = false;

        $explodedNumber = explode('.', $number);

        if ($number < 0) {
            $number = abs($number);
            $negativeValue = true;
        }

        if (isset($explodedNumber[1]) && strlen($explodedNumber[1]) > 3) {
            if (999 < $number && $number < 1000) {
                $number = round($number);
            }
        }

        if ($number < 1000) {
            $result = number_format($number,2, '.', ' ');
        }
        else if (1000 <= $number && $number < 99950) {
            $result = number_format($number, 0, '', ' ');
        }
        else if (99950 <= $number && $number < 999500) {

            if ($number < 100000)
                $result = '100';
            else
                $result = round(($number/1000));

            $result .= 'K';
        }
        else if ($number >= 999500 ) {

            if (0 < $number && $number < 1000000)
                $result = '1.00M';
            else {
                $result = round(($number/1000000), 2);
                $result = number_format($result,2);
                $result .= 'M';
            }
        }

        if ($negativeValue === true)
            $result = '-'.$result;

        return $result;
    }
}