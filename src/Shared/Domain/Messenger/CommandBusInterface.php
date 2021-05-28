<?php

declare(strict_types=1);

namespace RaspinuOffice\Shared\Domain\Messenger;


use RaspinuOffice\Shared\Domain\Messenger\Command\Command;

interface CommandBusInterface
{
    public function dispatch(Command $command): void;
}