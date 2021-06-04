<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Label\Application\Command;


use RaspinuOffice\Shared\Domain\Messenger\Command\Command;

final class CreateLabelCommand extends Command
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

    public function _toArray(): array
    {
        return [
            'id'=>$this->id(),
            'name'=>$this->name(),
        ];
    }
}