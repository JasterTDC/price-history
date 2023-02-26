<?php

declare(strict_types=1);

namespace JasterTDC\PriceHistory\Shared\Domain\Exception;

use Exception;

final class InvalidName extends Exception
{
    public static function build(): self
    {
        return new self('Name cannot be empty');
    }
}
