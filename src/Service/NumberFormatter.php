<?php

namespace App\Service;


class NumberFormatter
{
    public function format(float $number): string
    {
        $result = 0;


        $explodedNumber = explode('.', $number);

        if (isset($explodedNumber[1]) && strlen($explodedNumber[1]) > 2) {
            if ((999 < $number && $number < 1000) || (-1000 < $number && $number < -999 )) {
                $number = round($number);
            }
        }

        if ((0 < $number && $number < 1000) || (-1000 < $number && $number < 0)) {
            $result = number_format($number,2, '.', ' ');
        }
        else if ((1000 <= $number && $number < 99950) || (-99950 < $number && $number <= -1000)) {
            $result = number_format($number, 0, '', ' ');
        }
        else if ((99950 <= $number && $number < 999500) || (-999500 < $number && $number <= -99950)) {

            if (0 < $number && $number < 100000)
                $result = '100';
            else if (-100000 < $number && $number < 0)
                $result = '-100';
            else
                $result = round(($number/1000));

            $result .= 'K';
        }
        else if (($number >= 999500) || (-999500 >= $number) ) {

            if (0 < $number && $number < 1000000)
                $result = '1.00M';
            else if (-1000000 < $number && $number < 0)
                $result = '-1.00M';
            else {
                $result = round(($number/1000000), 2);
                $result = number_format($result,2);
                $result .= 'M';
            }
        }

        return $result;
    }
}