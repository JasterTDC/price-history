<?php

namespace JasterTDC\PriceHistory\Box\Domain\Repository;

use JasterTDC\PriceHistory\Box\Domain\Box;

interface BoxRepository
{
    public function save(Box ...$boxes): void;
}
