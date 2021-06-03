<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Application\Command;


use RaspinuOffice\Shared\Domain\Messenger\Command\Command;

final class RemoveGenerCommand extends Command
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function _toArray(): array
    {
        return [
            'id' => $this->id()
        ];
    }

    public function _toString(): string
    {
        $toString = $this->_toArray();

        return json_encode($toString);
    }
}