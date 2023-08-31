<?php

declare(strict_types=1);

namespace JasterTDC\PriceHistory\Shared\Domain\Exception;

use Exception;

final class InvalidCategoryId extends Exception
{
    public static function build(int $value): self
    {
        return new self(sprintf('Invalid category id: %s', $value));
    }
}
