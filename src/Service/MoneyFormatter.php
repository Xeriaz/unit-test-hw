<?php

namespace App\Service;


class MoneyFormatter
{
    /**
     * @var NumberFormatter
     */
    private $numberFormatter;

    public function __construct(NumberFormatter $numberFormatter)
    {
        $this->numberFormatter = $numberFormatter;
    }

    public function formatEur(float $number): string
    {
        return sprintf('%s €', $this->numberFormatter->format($number));
    }

    public function formatUsd(float $number): string
    {
        return sprintf('$%s', $this->numberFormatter->format($number));
    }
}