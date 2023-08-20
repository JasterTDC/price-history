<?php

namespace JasterTDC\PriceHistory\Tests\BoxPrice\Domain\ObjectMother;

use JasterTDC\PriceHistory\BoxPrice\Domain\BoxPrice;
use JasterTDC\PriceHistory\Tests\Shared\Domain\ObjectMother\BoxIdObjectMother;
use JasterTDC\PriceHistory\Tests\Shared\Domain\ObjectMother\DateTimeImmutableObjectMother;
use JasterTDC\PriceHistory\Tests\Shared\Domain\ObjectMother\PriceObjectMother;

final readonly class BoxPriceObjectMother
{
    public static function build(
        int $primitiveBoxId = null,
        float $primitiveSellPrice = null,
        float $primitiveCashPrice = null
    ): BoxPrice {
        return new BoxPrice(
            boxId: BoxIdObjectMother::build($primitiveBoxId),
            sellPrice: PriceObjectMother::build($primitiveSellPrice),
            cashPrice: PriceObjectMother::build($primitiveCashPrice),
            createdAt: DateTimeImmutableObjectMother::now()
        );
    }

    public static function buildCollection(BoxPrice ...$boxPrices): array
    {
        $ret = [];

        foreach ($boxPrices as $boxPrice) {
            $ret[$boxPrice->boxId()] = $boxPrice;
        }

        return $ret;
    }
}