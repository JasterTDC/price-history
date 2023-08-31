<?php

declare(strict_types=1);

namespace JasterTDC\PriceHistory\Shared\Domain;

use JasterTDC\PriceHistory\Shared\Domain\Exception\InvalidCategoryId;

final readonly class CategoryId extends IntegerValueObject
{
    /** @throws InvalidCategoryId */
    public function __construct(int $value)
    {
        $this->ensureIsValid($value);
        parent::__construct($value);
    }

    /** @throws InvalidCategoryId */
    private function ensureIsValid(int $value): void
    {
        if ($value <= 0) {
            throw InvalidCategoryId::build($value);
        }
    }
}
