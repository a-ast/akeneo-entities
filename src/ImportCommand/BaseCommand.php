<?php

namespace Aa\AkeneoImport\ImportCommand;

use Aa\AkeneoImport\ArrayFormattable;

abstract class BaseCommand implements ArrayFormattable
{
    /**
     * @var array
     */
    protected $data = [];

    protected function set(string $fieldName, $data)
    {
        $this->data[$fieldName] = $data;
    }

    public function fromArray(array $data): ArrayFormattable
    {
        $this->data = $data;

        return $this;
    }

    public function toArray(): array
    {
        return $this->data;
    }
}
