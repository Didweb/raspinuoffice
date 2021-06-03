<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Domain;

use Exception;
use RaspinuOffice\Backoffice\Products\Gener\Domain\Exceptions\GenerNotFoundException;
use RaspinuOffice\Backoffice\Products\Gener\Domain\ValueObjects\GenerId;

final class GenerFinder
{
    private GenerRepository $repository;

    public function __construct(GenerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(GenerId $generId): Gener
    {
        $gener = $this->repository->find($generId);

        if (null === $gener) {
            throw  GenerNotFoundException::ofId($generId);
        }

        return $gener;
    }

}