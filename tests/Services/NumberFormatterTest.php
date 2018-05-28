<?php

namespace App\Tests;


use App\Service\NumberFormatter;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class NumberFormatterTest extends TestCase
{

    public function getFormatData()
    {
        return [
//          POSITIVE VALUES
            [2835779,    '2.84M' ],
            [999500,     '1.00M' ],
            [1000000.01, '1.00M' ],
            [1000001.01, '1.00M' ],
            [1000300.01, '1.00M' ],
            [1005300.01, '1.01M' ],
            [1065300.01, '1.07M' ],
            [1705300.01, '1.71M' ],
            [1765300.01, '1.77M' ],
            [535216,     '535K'  ],
            [99950,      '100K'  ],
            [27533.78,   '27 534'],
            [999.99,     '999.99'],
            [999.9999,   '1 000' ],
            [123654.89,  '124K'  ],
            [533.1,      '533.10'],
            [66.6666,    '66.67' ],
            [12.00,      '12'    ],
            [0,          '0'     ],

//          NEGATIVE VALUES
            [-2835779,    '-2.84M' ],
            [-999500,     '-1.00M' ],
            [-1000000.01, '-1.00M' ],
            [-1000001.01, '-1.00M' ],
            [-1000300.01, '-1.00M' ],
            [-1005300.01, '-1.01M' ],
            [-1065300.01, '-1.07M' ],
            [-1705300.01, '-1.71M' ],
            [-1765300.01, '-1.77M' ],
            [-535216,     '-535K'  ],
            [-99950,      '-100K'  ],
            [-27533.78,   '-27 534'],
            [-999.99,     '-999.99'],
            [-999.9999,   '-1 000' ],
            [-123654.89,  '-124K'  ],
            [-533.1,      '-533.10'],
            [-66.6666,    '-66.67' ],
            [-12.00,      '-12'    ],
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
