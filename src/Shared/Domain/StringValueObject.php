<?php

declare(strict_types=1);

namespace JasterTDC\PriceHistory\Shared\Domain;

readonly class StringValueObject
{
    public function __construct(protected string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(StringValueObject $other): bool
    {
        return $this->value() === $other->value();
    }
}