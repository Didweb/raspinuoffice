<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Infrastructure\Doctrine\Repository;


use Doctrine\ORM\EntityManagerInterface;
use RaspinuOffice\Backoffice\Products\Gener\Domain\Gener;
use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerRepository;

final class DoctrineGenerRepository  implements GenerRepository
{

    public function __construct(EntityManagerInterface $manager)
    {
        $this->em = $manager;
        $this->repository = $this->em->getRepository(Gener::class);
    }

    public function save(Gener $gener): void
    {
        $this->em->persist($gener);
    }
}