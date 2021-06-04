<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Label\Domain\Exceptions;

use RaspinuOffice\Backoffice\Products\Label\Domain\ValueObjects\LabelName;
use Symfony\Component\HttpKernel\Exception\HttpException;

final class LabelThisNameAlreadyExist extends HttpException
{
    public static function onName(LabelName $name): self
    {
        $message = sprintf('Label with name <%s> not found', $name->value());

        return new self(
            204,
            $message,
            null,
            [
                'content-type' => 'application/json',
                'message' => $message
            ]
        );
    }
}