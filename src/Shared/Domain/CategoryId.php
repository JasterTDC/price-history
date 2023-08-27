<?php

namespace JasterTDC\PriceHistory\Shared\Domain;

use JasterTDC\PriceHistory\Shared\Domain\Exception\InvalidCategoryId;

final readonly class CategoryId extends IntegerValueObject
{
    public function __construct(int $value)
    {
        $this->ensureIsValid($value);
        parent::__construct($value);
    }

    private function ensureIsValid(int $value): void
    {
        if ($value <= 0) {
            throw new InvalidCategoryId($value);
        }
    }
}
