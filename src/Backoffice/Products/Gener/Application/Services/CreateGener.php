<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Application\Services;


use RaspinuOffice\Backoffice\Products\Gener\Application\Command\CreateGenerServiceCommand;
use RaspinuOffice\Backoffice\Products\Gener\Domain\Gener;
use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerRepository;

class CreateGener
{
    private GenerRepository $repository;

    public function __construct(GenerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateGenerServiceCommand $command): void
    {
        $gener = new Gener(
            $command->id(),
            $command->name()
        );

        if($this->repository->findByName($command->name()) == null ){
            $this->repository->save($gener);
        }

    }

}