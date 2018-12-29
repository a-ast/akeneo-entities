<?php

namespace Aa\AkeneoImport\ImportCommands;

abstract class BaseCommand
{
    /**
     * @var array
     */
    protected $data = [];

    protected function set(string $fieldName, $data)
    {
        $this->data[$fieldName] = $data;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data)
    {
        $this->data = $data;
    }
}
