<?php

namespace Aa\AkeneoImport\ImportCommand\ProductModel;

use Aa\AkeneoImport\ImportCommand\Media\CreateProductMediaFile;

/**
 * Update Product model
 *
 * @see https://api.akeneo.com/api-reference.html#patch_product_models
 */
class ProductModelCommandBuilder
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var \Aa\AkeneoImport\ImportCommand\CommandInterface[]|array
     */
    private $commands = [];

    /**
     * @var array
     */
    private $values = [];

    /**
     * @var array
     */
    private $associations = [];

    public function __construct(string $code)
    {
        $this->code = $code;
    }

    public function setFamilyVariant(?string $familyVariant): self
    {
        $this->commands[] = new SetFamilyVariant($this->code, $familyVariant);

        return $this;
    }

    public function setParent(?string $parent): self
    {
        $this->commands[] = new SetParent($this->code, $parent);

        return $this;
    }

    public function setCategories(array $categories): self
    {
        $this->commands[] = new SetCategories($this->code, $categories);

        return $this;
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

    public function addMediaValue(string $attributeCode, string $fileName, ?string $locale = null, ?string $scope = null): self
    {
        $this->commands[] = new CreateProductMediaFile($this->code, $fileName, $attributeCode, $scope, $locale);

        return $this;
    }

    public function addImageValue(string $attributeCode, string $fileName, ?string $locale = null, ?string $scope = null): self
    {
        $this->addMediaValue($attributeCode, $fileName, $locale, $scope);

        return $this;
    }

    public function addFileValue(string $attributeCode, string $fileName, ?string $locale = null, ?string $scope = null): self
    {
        $this->addMediaValue($attributeCode, $fileName, $locale, $scope);

        return $this;
    }

    public function addAssociatedGroups(string $associationTypeCode, array $groupCodes): self
    {
        return $this->addAssociations('groups', $associationTypeCode, $groupCodes);
    }

    public function addAssociatedProducts(string $associationTypeCode, array $productIdentifiers): self
    {
        return $this->addAssociations('products', $associationTypeCode, $productIdentifiers);
    }

    public function addAssociatedProductModels(string $associationTypeCode, array $productModelCodes): self
    {
        return $this->addAssociations('product_models', $associationTypeCode, $productModelCodes);
    }

    private function addAssociations(string $associationEntity, string $associationTypeCode, array $identifiers): self
    {
        $existingIdentifiers = $this->associations[$associationTypeCode][$associationEntity] ?? [];

        $this->associations[$associationTypeCode][$associationEntity] = array_merge($existingIdentifiers, $identifiers);

        return $this;
    }

    public function getCommands(): iterable
    {
        return $this->commands + [
                new SetValues($this->code, $this->values),
                new SetAssociations($this->code, $this->associations)
            ];
    }
}
