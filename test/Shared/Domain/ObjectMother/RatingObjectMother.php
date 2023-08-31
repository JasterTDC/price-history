<?php

declare(strict_types=1);

namespace JasterTDC\PriceHistory\Tests\Shared\Domain\ObjectMother;

use JasterTDC\PriceHistory\Shared\Domain\Rating;

final class RatingObjectMother
{
    public static function build(?float $primitiveRating = null): Rating
    {
        return new Rating($primitiveRating ?? 3.5);
    }
}
