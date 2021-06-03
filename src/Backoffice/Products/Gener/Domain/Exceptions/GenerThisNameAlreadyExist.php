<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Domain\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

final class GenerThisNameAlreadyExist extends HttpException
{
    public static function ofName(string $generName): self
    {
        return new self(204,
            sprintf('The name <%s> already exists.', $generName)
        );

    }
}