<?php

declare(strict_types=1);

namespace RaspinuOffice\Tests\Double\Backoffice\Products\Gener\Domain;


use Doctrine\Common\Collections\ArrayCollection;
use RaspinuOffice\Backoffice\Products\Gener\Domain\Gener;
use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerRepository;
use RaspinuOffice\Backoffice\Products\Gener\Domain\ValueObjects\GenerId;

final class GenerInMemeoryRepositoryStub
{

    public static function empty(): GenerRepository
    {
        return self::repository([]);
    }

    private static function repository(array $crmData)
    {
        return (
        new class($crmData) implements GenerRepository
        {
            private ArrayCollection $arrayCollection;

            public function __construct(?array $crmData)
            {
                $this->arrayCollection = new ArrayCollection($crmData);
            }

            public function save(Gener $gener): void
            {
                if ($this->arrayCollection->contains($gener)) {
                    $this->arrayCollection->removeElement($gener);
                    $this->arrayCollection->add($gener);
                } else {
                    $this->arrayCollection->add($gener);
                }
            }

            public function findByName(string $name): ?Gener
            {
                $filter = $this->arrayCollection->filter(
                    function (Gener $gener) use ($name) {
                        return $gener->name() == $name;
                    }
                );

                return $filter->count() ? $filter->first() : null;
            }

            public function find(GenerId $generId): ?Gener
            {
                $filter = $this->arrayCollection->filter(
                    function (Gener $gener) use ($generId) {
                        return $gener->id()->equals($generId);
                    }
                );

                return $filter->count() ? $filter->first() : null;
            }

            public function remove(Gener $gener): void
            {
                $this->arrayCollection->removeElement($gener);

            }
        }
        );
    }
}