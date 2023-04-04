<?php

namespace JasterTDC\PriceHistory\Tests\Shared\Domain;

use JasterTDC\PriceHistory\Shared\Domain\PriceId;
use PHPUnit\Framework\TestCase;

final class PriceIdTest extends TestCase
{
    public function testGivenValidWhenCreateThenReturnValid(): void
    {
        // Given
        $primitivePriceId = '98a83fb1-0ccf-45ef-9c01-a267a4e63056';
        $actual = new PriceId($primitivePriceId);

        $this->assertEquals($primitivePriceId, $actual->value());
        $this->assertEquals($primitivePriceId, $actual->__toString());
    }
}
