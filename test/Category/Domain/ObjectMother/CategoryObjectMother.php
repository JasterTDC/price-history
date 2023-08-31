<?php

declare(strict_types=1);

namespace JasterTDC\PriceHistory\Tests\Category\Domain\ObjectMother;

use JasterTDC\PriceHistory\Category\Domain\Category;
use JasterTDC\PriceHistory\Tests\Shared\Domain\ObjectMother\NameObjectMother;

final class CategoryObjectMother
{
    public static function build(
        ?Category $parentCategory = null,
        ?int $primitiveCategoryId = null,
        ?string $primitiveName = null,
        ?string $primitiveFriendlyName = null
    ): Category {
        $id = CategoryIdObjectMother::build($primitiveCategoryId);
        $name = NameObjectMother::build($primitiveName);
        $friendlyName = NameObjectMother::build($primitiveFriendlyName);

        return new Category(
            id: $id,
            name: $name,
            friendlyName: $friendlyName,
            parentCategory: $parentCategory
        );
    }
}
