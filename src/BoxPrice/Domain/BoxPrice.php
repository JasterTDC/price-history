<?php

namespace JasterTDC\PriceHistory\BoxPrice\Domain;

use DateTimeImmutable;
use JasterTDC\PriceHistory\Shared\Domain\BoxId;
use JasterTDC\PriceHistory\Shared\Domain\Price;

final class BoxPrice
{
    public function __construct(
        private BoxId $boxId,
        private Price $sellPrice,
        private Price $cashPrice,
        private DateTimeImmutable $createdAt
    ) {
    }

    public function boxId(): int
    {
        return $this->boxId->value();
    }

    public function sellPrice(): float
    {
        return $this->sellPrice->value();
    }

    public function cashPrice(): float
    {
        return $this->cashPrice->value();
    }

    public function createdAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }
}
