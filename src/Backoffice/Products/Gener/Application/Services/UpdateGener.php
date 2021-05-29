<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Application\Services;


use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerFinder;
use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerFinderByName;
use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerRepository;
use RaspinuOffice\Shared\Domain\Messenger\QueryBusInterface;

final class UpdateGener
{
    private GenerFinder $finder;
    private GenerFinderByName $finderByName;
    private GenerRepository $repository;
    private QueryBusInterface $queryBus;

    public function __construct(
        GenerRepository $repository,
        QueryBusInterface $queryBus
    ) {
        $this->repository = $repository;
        $this->finder = new GenerFinder($repository);
        $this->finderByName = new GenerFinderByName($repository);
        $this->queryBus = $queryBus;
    }

    public function __invoke(UpdateGenerServiceCommand $serviceCommand): void
    {
        $gener = $this->finder->__invoke($serviceCommand->id());

        $existThisGener = $this->finderByName->__invoke($serviceCommand->name());

        if (!$existThisGener) {
            $gener->updateGener($serviceCommand);
            $this->repository->save($gener);
        }
    }

}