<?php

declare(strict_types=1);

namespace RaspinuOffice\Tests\Double\Backoffice\Products\Gener\Domain;


use RaspinuOffice\Backoffice\Products\Gener\Domain\Gener;
use RaspinuOffice\Backoffice\Products\Gener\Domain\ValueObjects\GenerId;
use RaspinuOffice\Shared\Infrastructure\Helper\Faker;
use RaspinuOffice\Tests\Double\Backoffice\Products\Gener\Domain\ValueObjects\GenerIdStub;

final class GenerStub
{
    public static function random(): Gener
    {
        return new Gener(
            GenerIdStub::random(),
            Faker::word()
        );
    }

    public static function create(GenerId $generId, string $name): Gener
    {
        return new Gener(
            $generId,
            $name
        );
    }
}