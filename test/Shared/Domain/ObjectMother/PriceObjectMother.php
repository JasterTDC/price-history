<?php

namespace JasterTDC\PriceHistory\Tests\Shared\Domain\ObjectMother;

use JasterTDC\PriceHistory\Shared\Domain\Price;

final readonly class PriceObjectMother
{
    public static function build(float $value = null): Price
    {
        return new Price($value ?? 99.99);
    }
}
