<?php

namespace Aa\AkeneoImport\ImportCommand;

interface CommandWithValuesInterface extends CommandInterface
{
    public function addValue(string $attributeCode, $data, ?string $locale = null, ?string $scope = null): CommandWithValuesInterface;
}
