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

    public function toArray(): array
    {
        return $this->data;
    }
}
