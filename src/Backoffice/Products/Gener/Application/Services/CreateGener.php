<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Application\Services;


use RaspinuOffice\Backoffice\Products\Gener\Application\Command\CreateGenerServiceCommand;
use RaspinuOffice\Backoffice\Products\Gener\Domain\Gener;
use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerCheckName;
use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerRepository;

class CreateGener
{
    private GenerRepository $repository;
    private GenerCheckName $thisNameExist;

    public function __construct(GenerRepository $repository)
    {
        $this->repository = $repository;
        $this->thisNameExist = new GenerCheckName($repository);
    }

    public function __invoke(CreateGenerServiceCommand $command): void
    {
        $gener = new Gener(
            $command->id(),
            $command->name()
        );

        $this->thisNameExist->__invoke($gener->name());

        $this->repository->save($gener);
    }

}