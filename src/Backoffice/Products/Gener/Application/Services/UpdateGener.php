<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Application\Services;


use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerFinder;
use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerRepository;
use RaspinuOffice\Infrastructure\Messenger\QueryBusInterface;

final class UpdateGener
{
    private GenerFinder $finder;
    private GenerRepository $repository;
    private QueryBusInterface $queryBus;

    public function __construct(
        GenerRepository $repository,
        GenerFinder $finder,
        QueryBusInterface $queryBus
    )
    {
        $this->repository = $repository;
        $this->finder =  new GenerFinder($repository);
        $this->queryBus = $queryBus;
    }

    public function __invoke(UpdateGenerServiceCommand $serviceCommand): void
    {
        $gener = $this->finder->__invoke($serviceCommand->id());
        $gener->updateGener($serviceCommand);

        $this->repository->save($gener);
    }

}