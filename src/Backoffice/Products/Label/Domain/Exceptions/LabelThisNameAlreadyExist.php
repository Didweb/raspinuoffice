<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Label\Domain\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

final class LabelThisNameAlreadyExist extends HttpException
{
    public static function ofName(string $name): self
    {
        return new self(404,
                        sprintf('Label with name <%s> not found', $name)
        );
    }
}