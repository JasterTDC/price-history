<?php

declare(strict_types=1);

namespace JasterTDC\PriceHistory\Tests\Box\Domain\ObjectMother;

use JasterTDC\PriceHistory\Box\Domain\Box;
use JasterTDC\PriceHistory\Tests\Shared\Domain\ObjectMother\BoxIdObjectMother;
use JasterTDC\PriceHistory\Tests\Shared\Domain\ObjectMother\CategoryIdObjectMother;
use JasterTDC\PriceHistory\Tests\Shared\Domain\ObjectMother\NameObjectMother;
use JasterTDC\PriceHistory\Tests\Shared\Domain\ObjectMother\RatingObjectMother;

final class BoxObjectMother
{
    public static function build(
        ?int $primitiveBoxId = null,
        ?int $primitiveCategoryId = null,
        ?string $primitiveName = null,
        ?float $primitiveRating = null,
    ): Box {
        $id = BoxIdObjectMother::build($primitiveBoxId);
        $categoryId = CategoryIdObjectMother::build($primitiveCategoryId);
        $name = NameObjectMother::build($primitiveName);
        $rating = RatingObjectMother::build($primitiveRating);

        return new Box(
            id: $id,
            categoryId: $categoryId,
            name: $name,
            rating: $rating,
        );
    }
}
