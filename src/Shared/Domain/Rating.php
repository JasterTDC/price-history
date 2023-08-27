<?php

declare(strict_types=1);

namespace JasterTDC\PriceHistory\Shared\Domain;

use JasterTDC\PriceHistory\Shared\Domain\Exception\InvalidRating;

final readonly class Rating extends FloatValueObject
{
    public function __construct(float $value)
    {
        $this->ensureIsValid($value);
        parent::__construct($value);
    }

    private function ensureIsValid(float $value): void
    {
        if ($value >= 0.0 && $value <= 5.0) {
            return ;
        }

        throw InvalidRating::build($value);
    }
}
