<?php

namespace Aa\AkeneoImport\ImportCommand;

abstract class BaseCommandWithValues extends BaseCommand
{
    /**
     * @var array
     */
    protected $values = [];

    public function toArray(): array
    {
        if (count($this->values) > 0) {
            return array_merge($this->data, ['values' => $this->values]);
        }

        return $this->data;
    }

    public function addValue(string $attributeCode, $data, ?string $locale = null, ?string $scope = null): self
    {
        $this->values[$attributeCode][] = [
            'data' => $data,
            'locale' => $locale,
            'scope' => $scope,
        ];

        return $this;
    }
}
