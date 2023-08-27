<?php

namespace JasterTDC\PriceHistory\Tests\Shared\Domain;

use JasterTDC\PriceHistory\Shared\Domain\Rating;
use PHPUnit\Framework\TestCase;

final class RatingTest extends TestCase
{
    /** @dataProvider dataProviderForHappyPath */
    public function testGivenValidWhenHappyPathThenReturnValid(float $value): void
    {
        $actual = new Rating($value);

        $this->assertEquals($value, $actual->value());
    }

    public function dataProviderForHappyPath(): array
    {
        return [
            '1.0' => [1.0]
        ];
    }
}
