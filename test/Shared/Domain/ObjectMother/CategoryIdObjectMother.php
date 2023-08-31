<?php

namespace JasterTDC\PriceHistory\Tests\Shared\Domain\ObjectMother;

use JasterTDC\PriceHistory\Shared\Domain\CategoryId;

final class CategoryIdObjectMother
{
    public static function build(?int $primitiveId = null): CategoryId
    {
        return new CategoryId($primitiveId ?? 1);
    }
}
