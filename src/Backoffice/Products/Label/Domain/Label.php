<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Label\Domain;

use RaspinuOffice\Backoffice\Products\Label\Domain\ValueObject\LabelId;
use RaspinuOffice\Backoffice\Products\Label\Domain\ValueObject\LabelName;

final class Label
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