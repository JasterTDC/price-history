<?php

namespace JasterTDC\PriceHistory\Shared\Domain;

abstract readonly class FloatValueObject
{
    public function __construct(private float $value)
    {
    }

    public function value(): float
    {
        return $this->value;
    }
}
