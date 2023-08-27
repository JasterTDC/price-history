<?php

namespace JasterTDC\PriceHistory\Box\Domain\Factory;

use JasterTDC\PriceHistory\Box\Domain\Box;
use JasterTDC\PriceHistory\Shared\Domain\BoxId;
use JasterTDC\PriceHistory\Shared\Domain\CategoryId;
use JasterTDC\PriceHistory\Shared\Domain\Name;
use JasterTDC\PriceHistory\Shared\Domain\Rating;

final class BoxFactory
{
    public static function build(
        int $primitiveBoxId,
        int $primitiveCategoryId,
        string $primitiveName,
        float $primitiveRating
    ): Box {
        $boxId = new BoxId($primitiveBoxId);
        $categoryId = new CategoryId($primitiveCategoryId);
        $name = new Name($primitiveName);
        $rating = new Rating($primitiveRating);

        return new Box(
            id: $boxId,
            categoryId: $categoryId,
            name: $name,
            rating: $rating
        );
    }
}
