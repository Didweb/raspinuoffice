<?php

declare(strict_types=1);

namespace RaspinuOffice\Tests\src\Backoffice\Products\Gener\Application\Command;


use PHPUnit\Framework\TestCase;
use RaspinuOffice\Backoffice\Products\Gener\Application\Command\UpdateGenerCommand;
use RaspinuOffice\Backoffice\Products\Gener\Application\Command\UpdateGenerCommandHandler;
use RaspinuOffice\Backoffice\Products\Gener\Application\Services\UpdateGener;
use RaspinuOffice\Backoffice\Products\Gener\Application\Services\UpdateGenerServiceCommand;
use RaspinuOffice\Backoffice\Products\Gener\Domain\Gener;
use RaspinuOffice\Infrastructure\Messenger\QueryBusInterface;
use RaspinuOffice\Shared\Infrastructure\Helper\Faker;
use RaspinuOffice\Tests\Double\Backoffice\Products\Gener\Domain\GenerInMemeoryRepositoryStub;
use RaspinuOffice\Tests\Double\Backoffice\Products\Gener\Domain\GenerStub;
use RaspinuOffice\Tests\Double\Backoffice\Products\Gener\Domain\ValueObjects\GenerIdStub;

final class UpdateGenerCommandHandlerTest extends TestCase
{
    private UpdateGener $useCase;
    private UpdateGenerCommandHandler $handler;
    private QueryBusInterface $queryBus;
    private $repository;
    private Gener $gener;
    private UpdateGenerServiceCommand $command;


    public function setUp(): void
    {
        $this->queryBus = $this->createMock(QueryBusInterface::class);
        $this->repository = GenerInMemeoryRepositoryStub::empty();
        $this->useCase  = new UpdateGener( $this->repository,$this->queryBus);

        $this->gener = GenerStub::random();
        $this->command = new UpdateGenerServiceCommand(
            $this->gener->id(),
            $this->gener->name()
        );

    }

    public function test_should_update_gener_exist_name_gener(): void
    {
        $this->repository->save($this->gener);

        $this->useCase->__invoke($this->command);
        $generFind = $this->repository->find($this->gener->id());

        $this->assertEquals($generFind->id(), $this->gener->id());
    }

}