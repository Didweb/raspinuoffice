<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Application\Command;

use RaspinuOffice\Backoffice\Products\Gener\Domain\Gener;
use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerId;
use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerName;
use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerRepository;

final class GenerCreator
{
    private $repository;

    public function __construct(GenerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(GenerId $id, GenerName $name)
    {
        $gener = Gener::create($id, $name);

        $this->repository->save($gener);
    }
}