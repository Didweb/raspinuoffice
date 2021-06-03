<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Application\Services;


use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerFinder;
use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerRepository;

final class RemoveGener
{
    private GenerFinder $finder;
    private GenerRepository $repository;

    public function __construct(GenerRepository $repository, GenerFinder $finder)
    {
        $this->repository = $repository;
        $this->finder = $finder;
    }

    public function __invoke(RemoveGenerServiceCommand $serviceCommand): void
    {
        $gener = $this->finder->__invoke($serviceCommand->id());

        $this->repository->remove($gener);
    }

}