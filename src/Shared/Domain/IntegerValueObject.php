<?php

namespace JasterTDC\PriceHistory\Shared\Domain;

readonly class IntegerValueObject
{
    public function __construct(private int $value)
    {
    }

    public function value(): int
    {
        return $this->value;
    }

    public function equals(IntegerValueObject $obj): bool
    {
        return $this->value === $obj->value();
    }
}
