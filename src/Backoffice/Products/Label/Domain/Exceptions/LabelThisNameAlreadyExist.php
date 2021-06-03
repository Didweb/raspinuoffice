<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Label\Domain\Exceptions;


use RaspinuOffice\Backoffice\Products\Label\Domain\ValueObject\LabelId;
use Symfony\Component\HttpKernel\Exception\HttpException;

final class LabelThisNameAlreadyExist extends HttpException
{
    public static function ofId(LabelId $labelId): self
    {
        return new self(404,
                        sprintf('Label with id <%s> not found', (string)$labelId)
        );
    }
}