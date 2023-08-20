<?php

namespace JasterTDC\PriceHistory\Tests\Shared\Domain\ObjectMother;

use JasterTDC\PriceHistory\Shared\Domain\BoxId;

final class BoxIdObjectMother
{
    public static function build(int $value = null): BoxId
    {
        return new BoxId($value ?? 1);
    }
}
