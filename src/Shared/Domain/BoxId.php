<?php

namespace JasterTDC\PriceHistory\Shared\Domain;

use JasterTDC\PriceHistory\Shared\Domain\Exception\InvalidBoxId;

final readonly class BoxId extends IntegerValueObject
{
    /** @throws InvalidBoxId */
    public function __construct(int $value)
    {
        $this->ensureIsValid($value);
        parent::__construct($value);
    }

    private function ensureIsValid(int $value): void
    {
        if (empty($value)) {
            throw InvalidBoxId::build();
        }
    }
}
