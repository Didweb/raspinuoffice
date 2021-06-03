<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Label\Domain;

use RaspinuOffice\Backoffice\Products\Label\Domain\ValueObject\LabelId;

interface LabelRepository
{

    public function save(Label $label): void;

    public function findByName(string $name): ?Label;

    public function find(LabelId $labelId): ?Label;

    public function remove(Label $label): void;
}
