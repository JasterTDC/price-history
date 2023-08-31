<?php

namespace JasterTDC\PriceHistory\Box\Domain\Service;

use JasterTDC\PriceHistory\Box\Domain\Box;

interface BoxService
{
    /** @return array<int, Box> */
    public function getBoxesByPage(int $page): array;
}
