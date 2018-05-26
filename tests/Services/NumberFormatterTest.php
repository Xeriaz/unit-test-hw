<?php

namespace App\Tests;


use App\Service\NumberFormatter;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class NumberFormatterTest extends TestCase
{

    public function getFormatData()
    {
        return [
//            [2835779, 2835779],
            [2835779, '2.84M'],
            [999500, '1.00M'],
        ];
    }

    /**
     * @param $number
     * @param string $expected
     * @dataProvider getFormatData
     */
    public function testFormat(float $number, string $expected)
    {
        $formatter = new NumberFormatter();

        $value = $formatter->format($number);
        $this->assertEquals($expected, $value);
    }
}
