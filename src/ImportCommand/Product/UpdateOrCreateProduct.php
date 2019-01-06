<?php

namespace Aa\AkeneoImport\ImportCommand\Product;

use Aa\AkeneoImport\ImportCommand\BaseUpdateProductCommand;
use Aa\AkeneoImport\ImportCommand\Media\CreateProductMediaFile;

/**
 * Update Product
 *
 * @see https://api.akeneo.com/api-reference.html#patch_products__code_
 */
class UpdateOrCreateProduct extends BaseUpdateProductCommand
{
    public function __construct(string $identifier)
    {
        $this->set('identifier', $identifier);
    }

    public function setFamily(?string $family): self
    {
        $this->set('family', $family);

        return $this;
    }

    public function setParent(?string $parent): self
    {
        $this->set('parent', $parent);

        return $this;
    }

    public function setEnabled(?bool $enabled): self
    {
        $this->set('enabled', $enabled);

        return $this;
    }

    public function setGroups(array $groups): self
    {
        $this->set('groups', $groups);

        return $this;
    }

    public function setCategories(array $categories): self
    {
        $this->set('categories', $categories);

        return $this;
    }

    public function addMediaValue(string $attributeCode, string $fileName, ?string $locale = null, ?string $scope = null)
    {
        $mediaCommand = new CreateProductMediaFile($fileName, $this->data['identifier'], $attributeCode, $scope, $locale);
        $this->addExtraCommand($mediaCommand);
    }
}
