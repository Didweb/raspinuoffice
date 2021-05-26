<?php

declare(strict_types=1);

namespace RaspinuOffice\Api\Ports\Rest\Products\Gener\Request;


use InvalidArgumentException;

final class CreateGenerRequest
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

        if (!isset($content['name'])
        ) {
            throw new InvalidArgumentException('Field name is required');
        }

        return new self(
            $content['id'],
            $content['name']
        );
    }

}