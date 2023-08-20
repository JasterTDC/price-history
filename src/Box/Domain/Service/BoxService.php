<?php

namespace JasterTDC\PriceHistory\Box\Domain\Service;

interface BoxService
{
    /** @return array<int, Box> */
    public function getBoxesByPage(int $page): array;
}
