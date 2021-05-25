<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Application\Command;


use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerId;
use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerName;

final class CreateGenerCommandHandler
{

    private GenerCreator $creator;

    public function __construct(GenerCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(CreateGenerCommand $command): void
    {
        $id =  GenerId::create($command->id());
        $name =  new GenerName($command->name());

        $this->creator->__invoke($id, $name);
    }
}