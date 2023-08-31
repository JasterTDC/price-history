<?php

namespace JasterTDC\PriceHistory\Category\Domain\Repository;

use JasterTDC\PriceHistory\Category\Domain\Category;

interface CategoryRepository
{
    public function save(Category ...$categories): void;
}
