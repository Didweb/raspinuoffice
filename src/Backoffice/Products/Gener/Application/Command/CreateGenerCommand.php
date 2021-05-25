<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Application\Command;

use RaspinuOffice\Shared\Domain\Bus\Command\Command;

final class CreateGenerCommand implements Command
{
    private string $id;
    private string $name;

    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
}