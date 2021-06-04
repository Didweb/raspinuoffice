<?php

declare(strict_types=1);

namespace RaspinuOffice\Tests\Double\Backoffice\Products\Label\Domain\ValuesObjects;


use RaspinuOffice\Backoffice\Products\Label\Domain\ValueObjects\LabelId;
use RaspinuOffice\Shared\Infrastructure\Helper\Faker;

final class LabelIdStub
{
    public static function random(): LabelId
    {
        return LabelId::create(Faker::uuid());
    }

    public static function create(string $generId): LabelId
    {
        return LabelId::create($generId);
    }
}