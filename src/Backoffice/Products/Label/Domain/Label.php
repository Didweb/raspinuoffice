<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Label\Domain;


use RaspinuOffice\Backoffice\Products\Label\Domain\ValueObject\LabelId;
use RaspinuOffice\Backoffice\Products\Label\Domain\ValueObject\LableName;

final class Label
{
    private LabelId $labelId;
    private LableName $name;

    public function __construct(LabelId $labelId, LableName $name)
    {
        $this->labelId = $labelId;
        $this->name = $name;
    }

    public function labelId(): LabelId
    {
        return $this->labelId;
    }

    public function name(): LableName
    {
        return $this->name;
    }

}