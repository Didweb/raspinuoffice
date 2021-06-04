<?php

declare(strict_types=1);

namespace RaspinuOffice\Tests\src\Backoffice\Products\Label\Application;

use PHPUnit\Framework\TestCase;
use RaspinuOffice\Backoffice\Products\Label\Application\Command\CreateLabelCommand;
use RaspinuOffice\Backoffice\Products\Label\Application\Command\CreateLabelCommandHandler;
use RaspinuOffice\Backoffice\Products\Label\Application\Services\CreateLabel;
use RaspinuOffice\Backoffice\Products\Label\Application\Services\CreateLabelServiceCommand;
use RaspinuOffice\Backoffice\Products\Label\Domain\Exceptions\LabelThisNameAlreadyExist;
use RaspinuOffice\Backoffice\Products\Label\Domain\Label;
use RaspinuOffice\Backoffice\Products\Label\Domain\ValueObjects\LabelName;
use RaspinuOffice\Shared\Infrastructure\Helper\Faker;
use RaspinuOffice\Tests\Double\Backoffice\Products\Label\Domain\LabelInMemoryRepositoryStub;
use RaspinuOffice\Tests\Double\Backoffice\Products\Label\Domain\LabelStub;
use RaspinuOffice\Tests\Double\Backoffice\Products\Label\Domain\ValuesObjects\LabelIdStub;
use RaspinuOffice\Tests\Double\Backoffice\Products\Label\Domain\ValuesObjects\LabelNameStub;

final class CreateLabelCommandHandlerTest extends TestCase
{

    private $useCase;
    private CreateLabelCommandHandler $handler;
    private $repository;
    private Label $label;
    private CreateLabelServiceCommand $command;

    protected function setUp(): void
    {

        $this->repository = LabelInMemoryRepositoryStub::empty();
        $this->useCase = new CreateLabel($this->repository);
        $this->handler = new CreateLabelCommandHandler($this->useCase);


        $this->label = LabelStub::random();
        $this->command = new CreateLabelServiceCommand(
            $this->label->id(),
            $this->label->name()
        );

        parent::setUp();
    }

    public function test_should_create_label_when_name_not_exist(): void
    {
        $command = new CreateLabelCommand(
            (string)LabelIdStub::random(),
            Faker::word()
        );

        $this->handler->__invoke($command);
        $itemInMemory = $this->repository->find(LabelIdStub::create($command->id()));
        $this->assertEquals($command->id(), $itemInMemory->id());

    }

    public function test_should_not_create_label_when_exist_name_label(): void
    {
        $this->expectException(LabelThisNameAlreadyExist::class);

        $useCase = new CreateLabel($this->repository);

        $this->repository->save($this->label);

        $labelCreate = LabelStub::create($this->label->id(), $this->label->name());
        $commandUpdate = new CreateLabelServiceCommand(
            $labelCreate->id(),
            $labelCreate->name()
        );

        $useCase->__invoke($commandUpdate);
    }
}