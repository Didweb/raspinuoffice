<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Application\Command;


use RaspinuOffice\Backoffice\Products\Gener\Application\Services\UpdateGener;
use RaspinuOffice\Backoffice\Products\Gener\Application\Services\UpdateGenerServiceCommand;
use RaspinuOffice\Backoffice\Products\Gener\Domain\ValueObjects\GenerId;

final class UpdateGenerCommandHandler
{
    private UpdateGener $updateGener;

    public function __construct(UpdateGener $updateGener)
    {
        $this->updateGener = $updateGener;
    }

    public function __invoke(UpdateGenerCommand $command): void
    {
        $serviceCommand = new UpdateGenerServiceCommand(
            GenerId::create($command->id()),
            $command->name()
        );

        $this->updateGener->__invoke($serviceCommand);
    }
}