<?php

declare(strict_types=1);

namespace RaspinuOffice\Shared\Infrastructure\Helper;


use Faker\Factory;

final class Faker
{
    private const LANG = 'es_ES';

    public static function word(): string
    {
        return Factory::create(self::LANG)->word();
    }

    public static function uuid(): string
    {
        return Factory::create(self::LANG)->uuid;
    }
}