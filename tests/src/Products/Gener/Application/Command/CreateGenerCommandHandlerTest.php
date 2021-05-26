<?php

declare(strict_types=1);

namespace RaspinuOffice\Tests\Products\Gener\Application\Command;

use PHPUnit\Framework\TestCase;
use RaspinuOffice\Backoffice\Products\Gener\Application\Command\CreateGenerCommand;
use RaspinuOffice\Backoffice\Products\Gener\Application\Command\CreateGenerCommandHandler;
use RaspinuOffice\Backoffice\Products\Gener\Application\Command\GenerCreator;
use RaspinuOffice\Tests\Products\Gener\Domain\GenerIdMother;
use RaspinuOffice\Tests\Products\Gener\Domain\GenerMother;
use RaspinuOffice\Tests\Products\Gener\Domain\GenerNameMother;
use RaspinuOffice\Tests\Products\Gener\GenerModuleUnitTestCase;

final class CreateGenerCommandHandlerTest extends GenerModuleUnitTestCase
{
    private CreateGenerCommandHandler $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new CreateGenerCommandHandler(new GenerCreator($this->repository()));


    }

    public function test_should_create_gener(): void
    {
        $command = CreateGenerCommandMother::random();
        $gener = GenerMother::fromRequest($command);

        $this->shouldSave($gener);

        $this->dispatch($command, $this->handler);
    }
}