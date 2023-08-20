<?php

namespace JasterTDC\PriceHistory\BoxPrice\Domain\Repository;

use JasterTDC\PriceHistory\BoxPrice\Domain\BoxPrice;

interface BoxPriceRepository
{
    public function save(BoxPrice ...$boxPrices): void;
}
