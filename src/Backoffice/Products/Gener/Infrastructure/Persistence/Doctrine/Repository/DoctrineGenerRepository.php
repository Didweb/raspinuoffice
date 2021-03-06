<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Infrastructure\Persistence\Doctrine\Repository;


use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use RaspinuOffice\Backoffice\Products\Gener\Domain\Gener;
use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerRepository;
use RaspinuOffice\Backoffice\Products\Gener\Domain\ValueObjects\GenerId;

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

    public function save(Gener $gener): void
    {
        $this->em->persist($gener);
    }

    public function findByName(string $name): ?Gener
    {
        return $this->repository->findOneBy(['name' => $name]);
    }

    public function find(GenerId $generId): ?Gener
    {
        return $this->repository->findOneBy(['id' => $generId]);
    }

    public function remove(Gener $gener): void
    {
        $this->em->remove($gener);
    }
}