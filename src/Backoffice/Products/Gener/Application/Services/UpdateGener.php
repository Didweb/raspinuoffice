<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Application\Services;


use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerCheckName;
use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerFinder;
use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerRepository;

final class UpdateGener
{
    private GenerFinder $finder;
    private GenerRepository $repository;
    private GenerCheckName $thisNameExist;

    public function __construct(
        GenerRepository $repository
    ) {
        $this->repository = $repository;
        $this->finder = new GenerFinder($repository);
        $this->thisNameExist = new GenerCheckName($repository);

    }

    public function __invoke(UpdateGenerServiceCommand $serviceCommand): void
    {
        $gener = $this->finder->__invoke($serviceCommand->id());

        $this->thisNameExist->__invoke($serviceCommand->name());

        $gener->updateGener($serviceCommand);
        $this->repository->save($gener);
    }

}