<?php

declare(strict_types=1);

namespace RaspinuOffice\Shared\Domain\ValueObjects;

use InvalidArgumentException;

abstract class Enum
{
    protected string $enum;

    public function __construct(string $enum)
    {
        $this->validate($enum);

        $this->enum = $enum;
    }

    private function validate(string $enum): void
    {
        if (!in_array($enum, $this->validValues())) {
            throw new InvalidArgumentException(
                sprintf(
                    "class [%s] the provided value <'%s'> is not correct only allowed: <'%s'>",
                    get_class($this),
                    $enum,
                    implode("', '", $this->validValues())
                )
            );
        }
    }

    abstract public static function validValues(): array;

    public function __toString(): string
    {
        return (string) $this->enum;
    }

    public function equals(self $other) : bool
    {
        return $other instanceof static && $this->enum === $other->enum;
    }

    public function id(): string
    {
        return $this->enum;
    }

    public function toArray(): array
    {
        return (array)$this->enum;
    }
}