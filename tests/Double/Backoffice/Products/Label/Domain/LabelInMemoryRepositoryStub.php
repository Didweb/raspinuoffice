<?php

declare(strict_types=1);

namespace RaspinuOffice\Tests\Double\Backoffice\Products\Label\Domain;


use Doctrine\Common\Collections\ArrayCollection;
use RaspinuOffice\Backoffice\Products\Label\Domain\Label;
use RaspinuOffice\Backoffice\Products\Label\Domain\LabelRepository;
use RaspinuOffice\Backoffice\Products\Label\Domain\ValueObjects\LabelId;
use RaspinuOffice\Backoffice\Products\Label\Domain\ValueObjects\LabelName;

final class LabelInMemoryRepositoryStub
{
    public static function empty(): LabelRepository
    {
        return self::repository([]);
    }

    private static function repository(array $crmData): LabelRepository
    {
        return (
        new class($crmData) implements LabelRepository
        {
            private ArrayCollection $arrayCollection;

            public function __construct(?array $crmData)
            {
                $this->arrayCollection = new ArrayCollection($crmData);
            }

            public function save(Label $label): void
            {
                if ($this->arrayCollection->contains($label)) {
                    $this->arrayCollection->removeElement($label);
                    $this->arrayCollection->add($label);
                } else {
                    $this->arrayCollection->add($label);
                }

            }

            public function findByName(LabelName $name): ?Label
            {
                $filter = $this->arrayCollection->filter(
                    function (Label $label) use ($name) {
                        return $label->name() == $name->value();
                    }
                );

                return $filter->count() ? $filter->first() : null;
            }

            public function find(LabelId $labelId): ?Label
            {
                $filter = $this->arrayCollection->filter(
                    function (Label $label) use ($labelId) {
                        return $label->id()->equals($labelId);
                    }
                );

                return $filter->count() ? $filter->first() : null;
            }

            public function remove(Label $label): void
            {
                $this->arrayCollection->removeElement($label);

            }
            public function show(): void
            {
                dump($this->arrayCollection);
            }

        }
        );
    }
}