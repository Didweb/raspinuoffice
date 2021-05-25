<?php

declare(strict_types=1);

namespace RaspinuOffice\Shared\Domain\Bus\Query;

interface QueryBus
{
    public function ask(Query $query): ?Response;
}