<?php

namespace JasterTDC\PriceHistory\Shared\Domain;

use JasterTDC\PriceHistory\Shared\Domain\Exception\InvalidBoxId;

final class BoxId
{
    private int $value;

    /** @throws InvalidBoxId */
    public function __construct(int $value)
    {
        $this->ensureIsValid($value);
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    private function ensureIsValid(int $value): void
    {
        if (empty($value)) {
            throw InvalidBoxId::build();
        }
    }
}
