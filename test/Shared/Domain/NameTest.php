<?php

declare(strict_types=1);

namespace JasterTDC\PriceHistory\Tests\Shared\Domain;

use JasterTDC\PriceHistory\Shared\Domain\Exception\InvalidName;
use JasterTDC\PriceHistory\Shared\Domain\Name;
use PHPUnit\Framework\TestCase;

final class NameTest extends TestCase
{
    public function testShouldCreateName(): void
    {
        $name = new Name('John Doe');

        $this->assertEquals('John Doe', $name->value());
    }

    public function testShouldThrowExceptionWhenNameIsEmpty(): void
    {
        $this->expectException(InvalidName::class);

        new Name('');
    }
}
