<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Label\Domain;


final class LabelCheckName
{
    private LabelRepository $repository;

    public function __construct(LabelRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $name): ?Label
    {
        $existThisName = $this->repository->findByName($name);

        if ($existThisName !== null) {
            throw GenerThisNameAlreadyExist::ofName($name);
        }
        return $existThisName;
    }
}