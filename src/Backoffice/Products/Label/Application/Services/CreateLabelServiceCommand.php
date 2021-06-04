<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Label\Application\Services;


use RaspinuOffice\Backoffice\Products\Label\Domain\ValueObjects\LabelId;
use RaspinuOffice\Backoffice\Products\Label\Domain\ValueObjects\LabelName;

final class CreateLabelServiceCommand
{
    private LabelId $id;
    private LabelName $name;

    public function __construct(LabelId $id, LabelName $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function id(): LabelId
    {
        return $this->id;
    }

    public function name(): LabelName
    {
        return $this->name;
    }
}