<?php

namespace JasterTDC\PriceHistory\Category\Domain;

use JasterTDC\PriceHistory\Shared\Domain\CategoryId;
use JasterTDC\PriceHistory\Shared\Domain\Name;

final readonly class Category
{
    public function __construct(
        private CategoryId $id,
        private Name $name,
        private Name $friendlyName,
        private ?Category $parentCategory = null
    ) {
    }

    public function idValue(): int
    {
        return $this->id->value();
    }

    public function name(): string
    {
        return $this->name->value();
    }

    public function friendlyName(): string
    {
        return $this->friendlyName->value();
    }

    public function parentCategory(): ?Category
    {
        return $this->parentCategory;
    }

    public function parentCategoryId(): ?int
    {
        return $this->parentCategory?->idValue();
    }
}
