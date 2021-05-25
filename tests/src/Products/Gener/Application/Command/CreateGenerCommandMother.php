<?php

declare(strict_types=1);

namespace RaspinuOffice\Tests\Products\Gener\Application\Command;


use RaspinuOffice\Backoffice\Products\Gener\Application\Command\CreateGenerCommand;
use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerId;
use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerName;
use RaspinuOffice\Tests\Products\Gener\Domain\GenerIdMother;
use RaspinuOffice\Tests\Products\Gener\Domain\GenerNameMother;

final class CreateGenerCommandMother
{
    public static function create(GenerId $id, GenerName $name): CreateGenerCommand
    {
        return new CreateGenerCommand($id->__toString(), $name->__toString());
    }

    public static function random(): CreateGenerCommand
    {
        return self::create(GenerIdMother::random(), GenerNameMother::random());
    }
}