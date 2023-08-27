<?php

namespace JasterTDC\PriceHistory\Shared\Domain\Exception;

use Exception;

final class InvalidRating extends Exception
{
    public static function build(float $value): self
    {
        return new self(sprintf('Invalid rating: %s', $value));
    }
}
