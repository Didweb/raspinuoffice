<?php

declare(strict_types=1);

namespace RaspinuOffice\Api\Ports\Rest\Products\Gener\Request;


use InvalidArgumentException;

final class UpdateGenerRequest
{
    private string $id;
    private string $name;

    public function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public static function fromContent(array $content): self
    {
        $content = $content['gener'][0];
        if (!isset($content['id'])
            || !isset($content['name'])
        ) {
            throw new InvalidArgumentException('Field id and name sind required');
        }

        return new self(
            $content['id'],
            $content['name']
        );
    }
}