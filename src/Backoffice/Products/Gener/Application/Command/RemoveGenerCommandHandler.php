<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Application\Command;


use RaspinuOffice\Backoffice\Products\Gener\Application\Services\RemoveGener;
use RaspinuOffice\Backoffice\Products\Gener\Application\Services\RemoveGenerServiceCommand;
use RaspinuOffice\Backoffice\Products\Gener\Domain\ValueObjects\GenerId;

final class RemoveGenerCommandHandler
{
    private RemoveGener $removeGener;

    public function __construct(RemoveGener $removeGener)
    {
        $this->removeGener = $removeGener;
    }

    public function __invoke(RemoveGenerCommand $command): void
    {
        $serviceComand = new RemoveGenerServiceCommand(GenerId::create($command->id()));

        $this->removeGener->__invoke($serviceComand);
    }
}