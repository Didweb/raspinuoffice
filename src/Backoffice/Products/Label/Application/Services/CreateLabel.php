<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Label\Application\Services;


use RaspinuOffice\Backoffice\Products\Label\Domain\Label;
use RaspinuOffice\Backoffice\Products\Label\Domain\LabelCheckName;
use RaspinuOffice\Backoffice\Products\Label\Domain\LabelRepository;

class CreateLabel
{
    private LabelRepository $repository;
    private LabelCheckName $thisNameExist;

    public function __construct(LabelRepository $repository)
    {
        $this->repository = $repository;
        $this->thisNameExist = new LabelCheckName($repository);
    }

    public function __invoke(CreateLabelServiceCommand $command): void
    {
        $label = new Label(
            $command->id(),
            $command->name()
        );

        $this->thisNameExist->__invoke($label->name());

        $this->repository->save($label);
    }

}