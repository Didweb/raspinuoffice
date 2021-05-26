<?php

declare(strict_types=1);

namespace RaspinuOffice\Tests\Shared\Infrastructure\PhpUnit;


use Mockery;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Mockery\Matcher\MatcherAbstract;
use Mockery\MockInterface;
use RaspinuOffice\Shared\Domain\Bus\Command\Command;
use RaspinuOffice\Tests\Shared\Domain\TestUtils;

abstract class UnitTestCase extends MockeryTestCase
{
    protected function mock(string $className): MockInterface
    {
        return Mockery::mock($className);
    }

    protected function dispatch(Command $command, callable $commandHandler): void
    {
        $commandHandler($command);
    }

    protected function similarTo($value, $delta = 0.0): MatcherAbstract
    {
        return TestUtils::similarTo($value, $delta);
    }
}