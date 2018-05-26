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
            [2835779,    '2.84M'],
            [999500,     '1.00M'],
            [1000000.01, '1.00M'],
            [1000001.01, '1.00M'],
            [1000300.01, '1.00M'],
            [1005300.01, '1.01M'],
            [1065300.01, '1.07M'],
            [1705300.01, '1.71M'],
            [1765300.01, '1.77M'],
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
