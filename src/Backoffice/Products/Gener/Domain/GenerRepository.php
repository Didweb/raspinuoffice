<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Domain;

use RaspinuOffice\Backoffice\Products\Gener\Domain\ValueObjects\GenerId;

interface GenerRepository
{
    public function save(Gener $gener): void;

    public function findByName(string $name): ?Gener;

    public function find(GenerId $generId): ?Gener;
}