<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Infrastructure\Persistence\Doctrine\Repository;


use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use RaspinuOffice\Backoffice\Products\Gener\Domain\Gener;
use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerRepository;

final class DoctrineGenerRepository implements GenerRepository
{

    private EntityManagerInterface $em;
    private EntityRepository $repository;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->em = $manager;
        /** @var EntityRepository $repository */
        $repository = $this->em->getRepository(Gener::class);
        $this->repository = $repository;
    }

    public function save(Gener $employee): void
    {
        $this->em->persist($employee);
    }
}