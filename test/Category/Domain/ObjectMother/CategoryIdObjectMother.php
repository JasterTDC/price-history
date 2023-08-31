<?php

declare(strict_types=1);

namespace JasterTDC\PriceHistory\Tests\Category\Domain\ObjectMother;

use JasterTDC\PriceHistory\Shared\Domain\CategoryId;

final class CategoryIdObjectMother
{
    public static function build(?int $primitiveCategoryId = null): CategoryId
    {
        return new CategoryId($primitiveCategoryId ?? 1);
    }
}
