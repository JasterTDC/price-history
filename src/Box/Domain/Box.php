<?php

namespace JasterTDC\PriceHistory\Box\Domain;

use JasterTDC\PriceHistory\Shared\Domain\Name;
use JasterTDC\PriceHistory\Shared\Domain\BoxId;
use JasterTDC\PriceHistory\Shared\Domain\Rating;

final readonly class Box
{
    public function __construct(
        private BoxId $id,
        private Name $name,
        private Rating $rating
    ) {
    }

    public function id(): int
    {
        return $this->id->value();
    }

    public function name(): string
    {
        return $this->name->value();
    }

    public function rating(): float
    {
        return $this->rating->value();
    }
}
