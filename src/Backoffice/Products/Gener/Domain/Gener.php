<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Domain;

use RaspinuOffice\Backoffice\Products\Gener\Application\Services\UpdateGenerServiceCommand;
use RaspinuOffice\Backoffice\Products\Gener\Domain\ValueObjects\GenerId;

final class Gener
{
    private GenerId $id;
    private string $name;

    public function __construct(GenerId $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function id(): GenerId
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function updateGener(UpdateGenerServiceCommand $command): void
    {
        $this->name = $command->name();
    }
}