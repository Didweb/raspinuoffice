<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Application\Services;


use RaspinuOffice\Backoffice\Products\Gener\Domain\ValueObjects\GenerId;

final class RemoveGenerServiceCommand
{
    private GenerId $id;

    public function __construct(GenerId $id)
    {
        $this->id = $id;
    }

    public function id(): GenerId
    {
        return $this->id;
    }

}