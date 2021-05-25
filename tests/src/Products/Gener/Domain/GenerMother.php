<?php

declare(strict_types=1);

namespace RaspinuOffice\Tests\Products\Gener\Domain;


use RaspinuOffice\Backoffice\Products\Gener\Application\Command\CreateGenerCommand;
use RaspinuOffice\Backoffice\Products\Gener\Domain\Gener;
use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerId;
use RaspinuOffice\Backoffice\Products\Gener\Domain\GenerName;

final class GenerMother
{
    public static function create(GenerId $id, GenerName $name): Gener
    {
        return new Gener($id, $name);
    }

    public static function fromRequest(CreateGenerCommand $request): Gener
    {
        return self::create(
            GenerIdMother::create($request->id()),
            GenerNameMother::create($request->name())
        );
    }

    public static function random(): Gener
    {
        return self::create(GenerIdMother::random(), GenerNameMother::random());
    }
}