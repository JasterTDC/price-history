<?php

namespace JasterTDC\PriceHistory\Category\Domain\Repository;

use Category;

interface CategoryRepository
{
    public function save(Category ...$categories): void;
}
