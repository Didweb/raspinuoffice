<?php

declare(strict_types=1);

namespace RaspinuOffice\Tests\Products\Gener;


use Mockery\MockInterface;
use RaspinuOffice\Backoffice\Products\Gener\Domain\Gener;
use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerRepository;
use RaspinuOffice\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;

abstract class GenerModuleUnitTestCase extends UnitTestCase
{
    private $repository;

    protected function shouldSave(Gener $gener): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->with($this->similarTo($gener))
            ->once()
            ->andReturnNull();
    }

    /** @return GenerRepository|MockInterface */
    protected function repository(): MockInterface
    {
        return $this->repository = $this->repository ?: $this->mock(GenerRepository::class);
    }
}