<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Domain;


use RaspinuOffice\Backoffice\Products\Gener\Domain\Exceptions\GenerNotFoundException;

final class GenerFinderByName
{
    private GenerRepository $repository;

    public function __construct(GenerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $name): ?Gener
    {
        return $this->repository->findByName($name);
    }
}