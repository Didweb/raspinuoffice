<?php

declare(strict_types=1);

namespace RaspinuOffice\Tests\src\Backoffice\Products\Gener\Application\Command;


use PHPUnit\Framework\TestCase;
use RaspinuOffice\Backoffice\Products\Gener\Application\Services\RemoveGener;
use RaspinuOffice\Backoffice\Products\Gener\Domain\Gener;
use RaspinuOffice\Products\Gener\Application\Command\RemoveGenerCommandHandler;
use RaspinuOffice\Backoffice\Products\Gener\Application\Services\RemoveGenerServiceCommand;
use RaspinuOffice\Shared\Domain\Messenger\QueryBusInterface;
use RaspinuOffice\Tests\Double\Backoffice\Products\Gener\Domain\GenerInMemeoryRepositoryStub;
use RaspinuOffice\Tests\Double\Backoffice\Products\Gener\Domain\GenerStub;

final class removeGenerCommandHandlerTest extends TestCase
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
        $this->repository = GenerInMemeoryRepositoryStub::empty();
        $this->useCase = new RemoveGener($this->repository);

        $this->gener = GenerStub::random();


        $this->command = new RemoveGenerServiceCommand( $this->gener->id());

    }

    public function test_should_remove_gener_when_exist(): void
    {
        $this->repository->save($this->gener);


    }
}