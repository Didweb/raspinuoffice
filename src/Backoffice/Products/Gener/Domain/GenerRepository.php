<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Domain;

interface GenerRepository
{
    public function save(Gener $employee): void;
}