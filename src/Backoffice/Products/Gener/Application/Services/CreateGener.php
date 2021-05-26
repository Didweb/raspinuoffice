<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Application\Services;


use RaspinuOffice\Backoffice\Products\Gener\Application\Command\CreateGenerServiceCommand;
use RaspinuOffice\Backoffice\Products\Gener\Domain\Gener;

final class CreateGener
{
    private $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateGenerServiceCommand $command): void
    {
        $gener = new Gener(
            $command->id(),
            $command->name()
        );

        $this->repository->save($gener);
    }

}