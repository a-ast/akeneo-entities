<?php

namespace spec\Aa\AkeneoImport\fixture;

use Aa\AkeneoImport\ImportCommand\BaseUpdateProductCommand;

class TestCommand extends BaseUpdateProductCommand
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

    protected function addMediaValue(
        string $attributeCode,
        string $fileName,
        ?string $locale = null,
        ?string $scope = null
    ) {
        // TODO: do nothing
    }
}

