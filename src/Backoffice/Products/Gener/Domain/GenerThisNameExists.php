<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Domain;


use RaspinuOffice\Backoffice\Products\Gener\Domain\Exceptions\GenerThisNameAlreadyExist;

final class GenerThisNameExists
{
    private GenerRepository $repository;

    public function __construct(GenerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $name): ?Gener
    {

        $existThisName = $this->repository->findByName($name);

        if (!$existThisName) {
          throw GenerThisNameAlreadyExist::ofName($name);
        }
        return $existThisName;
    }
}