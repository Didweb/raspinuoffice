<?php

declare(strict_types=1);

namespace RaspinuOffice\Tests\src\Backoffice\Products\Gener\Application\Command;


use PHPUnit\Framework\TestCase;
use RaspinuOffice\Backoffice\Products\Gener\Application\Command\CreateGenerCommand;
use RaspinuOffice\Backoffice\Products\Gener\Application\Command\CreateGenerCommandHandler;
use RaspinuOffice\Backoffice\Products\Gener\Application\Command\CreateGenerServiceCommand;
use RaspinuOffice\Backoffice\Products\Gener\Application\Services\CreateGener;
use RaspinuOffice\Backoffice\Products\Gener\Application\Services\UpdateGenerServiceCommand;
use RaspinuOffice\Backoffice\Products\Gener\Domain\Exceptions\GenerThisNameAlreadyExist;
use RaspinuOffice\Backoffice\Products\Gener\Domain\Gener;
use RaspinuOffice\Shared\Infrastructure\Helper\Faker;
use RaspinuOffice\Tests\Double\Backoffice\Products\Gener\Domain\GenerInMemoryRepositoryStub;
use RaspinuOffice\Tests\Double\Backoffice\Products\Gener\Domain\GenerStub;
use RaspinuOffice\Tests\Double\Backoffice\Products\Gener\Domain\ValueObjects\GenerIdStub;

final class CreateGenerCommandHandlerTest extends TestCase
{
    private CreateGener $useCase;
    private CreateGenerCommandHandler $handler;
    private $repository;
    private Gener $gener;
    private UpdateGenerServiceCommand $command;

    protected function setUp(): void
    {
        $this->repository = GenerInMemoryRepositoryStub::empty();
        $this->useCase = new CreateGener($this->repository);
        $this->handler = new CreateGenerCommandHandler($this->useCase);

        $this->gener = GenerStub::random();
        $this->command = new UpdateGenerServiceCommand(
            $this->gener->id(),
            $this->gener->name()
        );

        parent::setUp();
    }

    public function test_should_create_gener(): void
    {
        $command = new CreateGenerCommand(
            (string)GenerIdStub::random(),
            Faker::word()
        );

        $this->handler->__invoke($command);
        $itemInMemory = $this->repository->find(GenerIdStub::create($command->id()));
        $this->assertEquals($command->id(), $itemInMemory->id());
    }

    public function test_should_not_create_gener_when_exist_name_gener(): void
    {
        $this->expectException(GenerThisNameAlreadyExist::class);

        $useCase = new CreateGener($this->repository);

        $this->repository->save($this->gener);

        $generCreate = GenerStub::create($this->gener->id(), $this->gener->name());
        $commandUpdate = new CreateGenerServiceCommand(
            $generCreate->id(),
            $generCreate->name()
        );

        $useCase->__invoke($commandUpdate);
    }
}