<?php

declare(strict_types=1);

namespace RaspinuOffice\Api\Ports\Rest\Products\Gener\Request;


use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Request;

final class RemoveGenerRequest
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function id(): string
    {
        return $this->id;
    }

    public static function fromContent(Request $content): self
    {
        $id = $content->get('id');
        if (!$id)
        {
            throw new InvalidArgumentException('Field id is required');
        }

        return new self($id);
    }
}