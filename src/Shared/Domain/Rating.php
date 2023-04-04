<?php

declare(strict_types=1);

namespace JasterTDC\PriceHistory\Shared\Domain;

final class Rating
{
    public function __construct(private float $value)
    {
    }

    public function value(): float
    {
        return $this->value;
    }
}
