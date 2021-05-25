<?php

declare(strict_types=1);

namespace RaspinuOffice\Backoffice\Products\Gener\Domain;


final class Gener
{
    private GenerId $id;
    private GenerName $name;

    public function __construct(GenerId $id, GenerName $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function create(GenerId $id, GenerName $name): self
    {
        return new self($id, $name);
    }

    public function id(): GenerId
    {
        return $this->id;
    }

    public function name(): GenerName
    {
        return $this->name;
    }
}