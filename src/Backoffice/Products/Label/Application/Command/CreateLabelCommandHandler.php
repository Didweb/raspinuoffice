<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Label\Application\Command;


use RaspinuOffice\Backoffice\Products\Label\Application\Services\CreateLabel;
use RaspinuOffice\Backoffice\Products\Label\Application\Services\CreateLabelServiceCommand;
use RaspinuOffice\Backoffice\Products\Label\Domain\ValueObjects\LabelId;
use RaspinuOffice\Backoffice\Products\Label\Domain\ValueObjects\LabelName;

final class CreateLabelCommandHandler
{
    private CreateLabel $createLabel;

    public function __construct(CreateLabel $createLabel)
    {
        $this->createLabel = $createLabel;
    }

    public function __invoke(CreateLabelCommand $command): void
    {
        $serviceCommand = new CreateLabelServiceCommand(
            LabelId::create($command->id()),
            new LabelName($command->name())
        );

        $this->createLabel->__invoke($serviceCommand);
    }

}