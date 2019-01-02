<?php

namespace spec\Aa\AkeneoImport\fixture;

use Aa\AkeneoImport\ArrayFormattable;
use Aa\AkeneoImport\ImportCommand\BaseCommandWithValues;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;

class TestCommand extends BaseCommandWithValues
{
    public function __construct(string $identifier)
    {
        $this->setIdentifier($identifier);
    }

    public function setIdentifier(string $identifier)
    {
        $this->set('identifier', $identifier);
    }

    public function setDate(\DateTimeInterface $date)
    {
        $this->set('date', $date);
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->data['date'];
    }
}

