<?php

namespace JasterTDC\PriceHistory\BoxPrice\Domain\Repository;

use JasterTDC\PriceHistory\BoxPrice\Domain\BoxPrice;
use JasterTDC\PriceHistory\Shared\Domain\BoxId;

interface BoxPriceRepository
{
    /** @return array<int, BoxPrice> */
    public function getBoxPriceHistory(BoxId $boxId): array;
    public function save(BoxPrice ...$boxPrices): void;
}
