<?php

declare(strict_types=1);

namespace RaspinuOffice\Tests\src\Backoffice\Products\Gener\Application\Command;


use PHPUnit\Framework\TestCase;
use RaspinuOffice\Backoffice\Products\Gener\Application\Command\CreateGenerCommand;
use RaspinuOffice\Backoffice\Products\Gener\Application\Command\CreateGenerCommandHandler;
use RaspinuOffice\Backoffice\Products\Gener\Application\Services\CreateGener;
use RaspinuOffice\Shared\Infrastructure\Helper\Faker;
use RaspinuOffice\Tests\Double\Backoffice\Products\Gener\Domain\ValueObjects\GenerIdStub;

final class CreateGenerCommandHandlerTest extends TestCase
{
    private CreateGener $useCase;
    private CreateGenerCommandHandler $handler;

    protected function setUp(): void
    {
        $this->useCase = $this->createMock(CreateGener::class);
        $this->handler = new CreateGenerCommandHandler($this->useCase);

        parent::setUp();
    }

    public function test_should_create_gener(): void
    {
        $command = new CreateGenerCommand(
            (string)GenerIdStub::random(),
            Faker::word()
        );

        $this->useCase->expects($this->once())
            ->method('__invoke');

        $this->handler->__invoke($command);
    }
}