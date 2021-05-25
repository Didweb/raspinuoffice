<?php

declare(strict_types=1);

namespace RaspinuOffice\Tests\Shared\Domain;


use RaspinuOffice\Tests\Shared\Infrastructure\Mockery\RaspinuOfficeMatcherIsSimilar;
use RaspinuOffice\Tests\Shared\Infrastructure\PhpUnit\Constraint\RaspinuOfficeConstraintIsSimilar;

final class TestUtils
{
    public static function isSimilar($expected, $actual): bool
    {
        $constraint = new RaspinuOfficeConstraintIsSimilar($expected);

        return $constraint->evaluate($actual, '', true);
    }

    public static function similarTo($value, $delta = 0.0): RaspinuOfficeMatcherIsSimilar
    {
        return new RaspinuOfficeMatcherIsSimilar($value, $delta);
    }
}