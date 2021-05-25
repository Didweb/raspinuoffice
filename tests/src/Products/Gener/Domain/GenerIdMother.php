<?php

declare(strict_types=1);

namespace RaspinuOffice\Tests\Products\Gener\Domain;

use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerId;
use RaspinuOffice\Tests\Shared\Domain\UuidMother;

final class GenerIdMother
{

    public static function create(string $value): GenerId
    {
        return GenerId::create($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): GenerId
    {
        return self::create(UuidMother::random());
    }
}