<?php

namespace JasterTDC\PriceHistory\Shared\Domain;

final class Price
{
    public function __construct(private float $value)
    {
    }

    public function value(): float
    {
        return $this->value;
    }
}
