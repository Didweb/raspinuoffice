<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Domain\Exceptions;


use RaspinuOffice\Backoffice\Products\Gener\Domain\ValueObjects\GenerId;
use Symfony\Component\HttpKernel\Exception\HttpException;

final class GenerNotFoundException extends HttpException
{
    public static function ofId(GenerId $generId): self
    {
        return new self(404,
                        sprintf('Gener with id <%s> not found', (string)$generId)
        );
    }
}