<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Domain;


use RaspinuOffice\Backoffice\Products\Gener\Domain\Exceptions\GenerThisNameAlreadyExist;

final class GenerCheckName
{
    private GenerRepository $repository;

    public function __construct(GenerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $name): ?Gener
    {
        $existThisName = $this->repository->findByName($name);

        if ($existThisName !== null) {
            throw GenerThisNameAlreadyExist::ofName($name);
        }
        return $existThisName;
    }
}