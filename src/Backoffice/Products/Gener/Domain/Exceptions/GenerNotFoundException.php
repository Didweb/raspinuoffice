<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Domain\Exceptions;

use RaspinuOffice\Backoffice\Products\Gener\Domain\ValueObjects\GenerId;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class GenerNotFoundException extends NotFoundHttpException
{
    public static function ofId(?GenerId $dealId): self
    {
        return new self(
            sprintf('Gener with id <%s> not found', (string)$dealId)
        );
    }
}