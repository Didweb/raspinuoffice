<?php

declare(strict_types=1);

namespace RaspinuOffice\Tests\Double\Backoffice\Products\Gener\Domain\ValueObjects;


use RaspinuOffice\Backoffice\Products\Gener\Domain\ValueObjects\GenerId;

final class GenerIdStub
{
    public static function random(): GenerId
    {
        return GenerId::create(Faker::uuid());
    }
}