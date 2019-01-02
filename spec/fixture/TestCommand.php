<?php

namespace spec\Aa\AkeneoImport\fixture;

use Aa\AkeneoImport\ImportCommand\BaseCommandWithValues;

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
}

