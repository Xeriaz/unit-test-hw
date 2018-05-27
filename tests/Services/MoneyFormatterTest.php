<?php

namespace App\Tests\Services;


use App\Service\MoneyFormatter;
use App\Service\NumberFormatter;
use PHPUnit\Framework\TestCase;

class MoneyFormatterTest extends TestCase
{
    public function testFormatEur()
    {
       $numberFormatterMock = $this->createMock(NumberFormatter::class);
       $numberFormatterMock->expects($this->any())
           ->method('format')
           ->with(2835779)
           ->willReturn('2.84M');

       $moneyFormatter = new MoneyFormatter($numberFormatterMock);
       $value = $moneyFormatter->formatEur(2835779);
       $this->assertEquals('2.84M €', $value);
    }

    public function testFormatUsd()
    {
        $numberFormatterMock = $this->createMock(NumberFormatter::class);
        $numberFormatterMock->expects($this->any())
            ->method('format')
            ->with(2835779)
            ->willReturn('2.84M');

        $moneyFormatter = new MoneyFormatter($numberFormatterMock);
        $value = $moneyFormatter->formatUsd(2835779);
        $this->assertEquals('$2.84M', $value);
    }
}