<?php

namespace JasterTDC\PriceHistory\BoxPrice\Domain\Factory;

use DateTimeImmutable;
use JasterTDC\PriceHistory\BoxPrice\Domain\BoxPrice;
use JasterTDC\PriceHistory\Shared\Domain\BoxId;
use JasterTDC\PriceHistory\Shared\Domain\Price;

final class BoxPriceFactory
{
    private const DATE_FORMAT = 'Y-m-d H:i:s';

    public static function build(
        int $primitiveBoxId,
        float $primitiveSellPrice,
        float $primitiveCashPrice,
        string $primitiveCreatedAt
    ): BoxPrice {
        $boxId = new BoxId($primitiveBoxId);
        $sellPrice = new Price($primitiveSellPrice);
        $cashPrice = new Price($primitiveCashPrice);
        $createdAt = DateTimeImmutable::createFromFormat(self::DATE_FORMAT, $primitiveCreatedAt);

        return new BoxPrice(
            boxId: $boxId,
            sellPrice: $sellPrice,
            cashPrice: $cashPrice,
            createdAt: $createdAt
        );
    }
}
