<?php

declare(strict_types=1);

namespace RaspinuOffice\Tests\Double\Backoffice\Products\Label\Domain;


use RaspinuOffice\Backoffice\Products\Label\Domain\Label;
use RaspinuOffice\Backoffice\Products\Label\Domain\ValueObjects\LabelId;
use RaspinuOffice\Backoffice\Products\Label\Domain\ValueObjects\LabelName;
use RaspinuOffice\Tests\Double\Backoffice\Products\Label\Domain\ValuesObjects\LabelIdStub;
use RaspinuOffice\Tests\Double\Backoffice\Products\Label\Domain\ValuesObjects\LabelNameStub;

final class LabelStub
{
    public static function random(): Label
    {
        return new Label(
            LabelIdStub::random(),
            LabelNameStub::random()
        );
    }

    public static function create(LabelId $generId, LabelName $name): Label
    {
        return new Label(
            $generId,
            $name
        );
    }
}