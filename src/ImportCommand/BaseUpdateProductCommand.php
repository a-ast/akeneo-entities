<?php

namespace Aa\AkeneoImport\ImportCommand;

abstract class BaseUpdateProductCommand extends BaseCommand
{
    /**
     * @var array
     */
    protected $values = [];

    /**
     * @var array
     */
    protected $associations = [];

    public function toArray(): array
    {
        if (count($this->values) > 0) {
            $this->data = array_merge($this->data, ['values' => $this->values]);
        }

        if (count($this->associations) > 0) {
            $this->data = array_merge($this->data, ['associations' => $this->associations]);
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

    public function setValues(array $values): self
    {
        $this->values = $values;

        return $this;
    }

    /**
     * @example:
     *
     * [
     *      'PACK' => [
     *          'groups' => ['a', 'b', 'c'],
     *          'products' => ['g'],
     *          'product_models' => ['e', 'f', 'k'],
     *      ],
     * ]
     */
    public function setAssociations(array $associations): self
    {
        $this->associations = $associations;

        return $this;
    }

    public function addAssociatedGroups(string $associationTypeCode, array $groupCodes): self
    {
        $existingGroupCodes = $this->associations[$associationTypeCode]['groups'] ?? [];

        $this->associations[$associationTypeCode]['groups'] = array_merge($existingGroupCodes, $groupCodes);

        return $this;
    }
}
