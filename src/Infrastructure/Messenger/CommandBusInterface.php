<?php

declare(strict_types=1);

namespace RaspinuOffice\Infrastructure\Messenger;


use RaspinuOffice\Infrastructure\Messenger\Command\Command;

interface CommandBusInterface
{
    public function dispatch(Command $command): void;
}