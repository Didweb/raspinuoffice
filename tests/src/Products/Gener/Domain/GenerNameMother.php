<?php

declare(strict_types=1);

namespace RaspinuOffice\Tests\Products\Gener\Domain;


use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerName;
use RaspinuOffice\Tests\Shared\Domain\WordMother;

final class GenerNameMother
{
    public static function create(string $value): GenerName
    {
        return new GenerName($value);
    }

    public static function random(): GenerName
    {
        return self::create(WordMother::random());
    }
}