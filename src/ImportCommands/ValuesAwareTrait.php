<?php

namespace Aa\AkeneoImport\ImportCommands;

trait ValuesAwareTrait
{
    public function addValue(string $attributeCode, $data, ?string $locale = null, ?string $scope = null): self
    {
        $this->data['values'][$attributeCode][] = [
            'data' => $data,
            'locale' => $locale,
            'scope' => $scope,
        ];

        return $this;
    }

    public function setValues(array $values): self
    {
        $this->set('values', $values);

        return $this;
    }
}
