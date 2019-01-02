<?php

namespace spec\Aa\AkeneoImport\fixture;

use Aa\AkeneoImport\ImportCommand\BaseCommand;

class TestCommandWithConstructor extends BaseCommand
{
    public function __construct(string $identifier, \DateTimeInterface $date, array $data)
    {
        $this->set('identifier', $identifier);
        $this->set('date', $date);
        $this->set('data', $data);
    }
}

