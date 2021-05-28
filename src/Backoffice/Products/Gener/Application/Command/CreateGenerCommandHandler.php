<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Application\Command;

use RaspinuOffice\Backoffice\Products\Gener\Application\Services\CreateGener;
use RaspinuOffice\Backoffice\Products\Gener\Domain\ValueObjects\GenerId;

final class CreateGenerCommandHandler
{
    private CreateGener $createGener;

    public function __construct(CreateGener $createGener)
    {
        $this->createGener = $createGener;
    }

    public function __invoke(CreateGenerCommand $command): void
    {
        $serviceCommand = new CreateGenerServiceCommand(
            GenerId::create($command->id()),
            $command->name()
        );

        $this->createGener->__invoke($serviceCommand);
    }

}