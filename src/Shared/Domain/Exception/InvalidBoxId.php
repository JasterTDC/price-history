<?php

namespace JasterTDC\PriceHistory\Shared\Domain\Exception;

use Exception;

final class InvalidBoxId extends Exception
{
    public static function build(): self
    {
        return new self('BoxId cannot be empty');
    }
}
