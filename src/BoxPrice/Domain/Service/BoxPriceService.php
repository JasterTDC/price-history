<?php

namespace JasterTDC\PriceHistory\BoxPrice\Domain\Service;

use JasterTDC\PriceHistory\BoxPrice\Domain\BoxPrice;

interface BoxPriceService
{
    /** @return array<int, BoxPrice> */
    public function getBoxPricesByPage(int $page): array;
}
