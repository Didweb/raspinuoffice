<?php

declare(strict_types=1);

namespace RaspinuOffice\Shared\Domain\Messenger;

use RaspinuOffice\Shared\Domain\Messenger\Query\Query;

interface QueryBusInterface
{
    /**
     * @psalm-suppress MissingReturnType
     * @phpstan-ignore-next-line
     */
    public function dispatch(Query $query);
}