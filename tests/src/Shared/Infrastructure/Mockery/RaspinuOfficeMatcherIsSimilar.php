<?php

declare(strict_types=1);

namespace RaspinuOffice\Tests\Shared\Infrastructure\Mockery;


use Mockery\Matcher\MatcherAbstract;
use RaspinuOffice\Tests\Shared\Infrastructure\PhpUnit\Constraint\RaspinuOfficeConstraintIsSimilar;

final class RaspinuOfficeMatcherIsSimilar  extends MatcherAbstract
{
    private $constraint;

    public function __construct($value, $delta = 0.0)
    {
        parent::__construct($value);

        $this->constraint = new RaspinuOfficeConstraintIsSimilar($value, $delta);
    }

    public function match(&$actual): bool
    {
        return $this->constraint->evaluate($actual, '', true);
    }

    public function __toString(): string
    {
        return 'Is similar';
    }
}