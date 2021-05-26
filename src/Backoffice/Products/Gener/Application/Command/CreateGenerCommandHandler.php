<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Application\Command;

use RaspinuOffice\Backoffice\Products\Gener\Application\Services\CreateGener;
use RaspinuOffice\Backoffice\Products\Gener\Domain\ValueObjects\GenerId;
use RaspinuOffice\Shared\Domain\ValueObjects\Uuid;

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
            GenerId::create(Uuid::next()),
            $command->name()
        );

        $this->createGener->__invoke($serviceCommand);
    }

}