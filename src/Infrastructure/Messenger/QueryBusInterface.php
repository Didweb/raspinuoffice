<?php

declare(strict_types=1);

namespace RaspinuOffice\Infrastructure\Messenger;

use RaspinuOffice\Infrastructure\Messenger\Query\Query;

interface QueryBusInterface
{
    /**
     * @psalm-suppress MissingReturnType
     * @phpstan-ignore-next-line
     */
    public function dispatch(Query $query);
}