<?php

namespace JasterTDC\PriceHistory\Tests\Shared\Domain\ObjectMother;

use JasterTDC\PriceHistory\Shared\Domain\Name;

final class NameObjectMother
{
    public static function build(?string $primitiveName = null): Name
    {
        return new Name($primitiveName ?? 'The perfect name');
    }
}
