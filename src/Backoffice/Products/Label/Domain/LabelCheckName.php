<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Label\Domain;


use RaspinuOffice\Backoffice\Products\Label\Domain\Exceptions\LabelThisNameAlreadyExist;
use RaspinuOffice\Backoffice\Products\Label\Domain\ValueObjects\LabelName;

final class LabelCheckName
{
    private LabelRepository $repository;

    public function __construct(LabelRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(LabelName $name): void
    {
        $existThisName = $this->repository->findByName($name);

        if ($existThisName) {
            throw   LabelThisNameAlreadyExist::onName($name);
        }
    }
}