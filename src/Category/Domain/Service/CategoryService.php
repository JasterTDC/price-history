<?php

namespace JasterTDC\PriceHistory\Category\Domain\Service;

interface CategoryService
{
    public function getCategoryByPage(int $page): array;
}
