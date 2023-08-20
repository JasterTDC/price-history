<?php

namespace JasterTDC\PriceHistory\Tests\Shared\Domain\ObjectMother;

use DateTimeImmutable;

final readonly class DateTimeImmutableObjectMother
{
    public static function now(): DateTimeImmutable
    {
        return new DateTimeImmutable();
    }
}
