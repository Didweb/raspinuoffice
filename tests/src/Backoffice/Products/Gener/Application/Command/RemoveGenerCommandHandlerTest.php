<?php

declare(strict_types=1);

namespace RaspinuOffice\Tests\src\Backoffice\Products\Gener\Application\Command;


use PHPUnit\Framework\TestCase;
use RaspinuOffice\Backoffice\Products\Gener\Application\Command\RemoveGenerCommand;
use RaspinuOffice\Backoffice\Products\Gener\Application\Command\RemoveGenerCommandHandler;
use RaspinuOffice\Backoffice\Products\Gener\Application\Services\RemoveGener;
use RaspinuOffice\Backoffice\Products\Gener\Domain\Exceptions\GenerNotFoundException;
use RaspinuOffice\Backoffice\Products\Gener\Domain\Gener;
use RaspinuOffice\Backoffice\Products\Gener\Application\Services\RemoveGenerServiceCommand;
use RaspinuOffice\Shared\Domain\Messenger\QueryBusInterface;
use RaspinuOffice\Tests\Double\Backoffice\Products\Gener\Domain\GenerInMemoryRepositoryStub;
use RaspinuOffice\Tests\Double\Backoffice\Products\Gener\Domain\GenerStub;


final class RemoveGenerCommandHandlerTest extends TestCase
{


    private RemoveGener $useCase;
    private RemoveGenerCommandHandler $handler;
    private QueryBusInterface $queryBus;
    private $repository;
    private Gener $gener;
    private RemoveGenerServiceCommand $command;

    public function setUp(): void
    {
        $this->queryBus = $this->createMock(QueryBusInterface::class);
        $this->repository = GenerInMemoryRepositoryStub::empty();
        $this->useCase = $this->createMock(RemoveGener::class);
        $this->handler = new RemoveGenerCommandHandler($this->useCase);

        $this->gener = GenerStub::random();


        $this->command = new RemoveGenerServiceCommand( $this->gener->id());

    }

    public function test_should_remove_gener_when_exist(): void
    {
        $this->repository->save($this->gener);

        $command = new RemoveGenerCommand((string)$this->gener->id());

        $this->useCase->expects($this->once())
            ->method('__invoke');

        $this->handler->__invoke($command);
    }


    public function test_should_remove_gener_when_not_exist(): void
    {

        $this->expectException(GenerNotFoundException::class);
        $generToRemove = GenerStub::random();

        $commandRemove = new RemoveGenerServiceCommand(
            $generToRemove->id()
        );

        $useCase = new RemoveGener($this->repository);
        $useCase->__invoke($commandRemove);

    }

}