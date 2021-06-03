<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Label\Application\Services;


use RaspinuOffice\Backoffice\Products\Label\Domain\Label;
use RaspinuOffice\Backoffice\Products\Label\Domain\LabelCheckName;
use RaspinuOffice\Backoffice\Products\Label\Domain\LabelRepository;

final class CreateLabel
{
    private LabelRepository $repository;
    private LabelCheckName $thisNameExist;

    public function __construct(LabelRepository $repository, LabelCheckName $thisNameExist)
    {
        $this->repository = $repository;
        $this->thisNameExist = $thisNameExist;
    }

    public function __invoke(CreateLabelServiceCommand $command): void
    {
        $gener = new Label(
            $command->id(),
            $command->name()
        );

        $this->thisNameExist->__invoke((string)$command->name());

        $this->repository->save($gener);
    }

}