<?php

namespace JasterTDC\PriceHistory\Box\Domain\Factory;

use JasterTDC\PriceHistory\Box\Domain\Box;
use JasterTDC\PriceHistory\Shared\Domain\BoxId;
use JasterTDC\PriceHistory\Shared\Domain\Name;
use JasterTDC\PriceHistory\Shared\Domain\Price;
use JasterTDC\PriceHistory\Shared\Domain\Rating;

final class BoxFactory
{
    public static function build(
        int $primitiveBoxId,
        string $primitiveName,
        float $primitivePrice,
        float $primitiveRating
    ): Box {
        $boxId = new BoxId($primitiveBoxId);
        $name = new Name($primitiveName);
        $price = new Price($primitivePrice);
        $rating = new Rating($primitiveRating);

        return new Box(
            id: $boxId,
            name: $name,
            price: $price,
            rating: $rating
        );
    }
}
