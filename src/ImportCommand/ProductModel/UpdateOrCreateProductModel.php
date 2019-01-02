<?php

namespace Aa\AkeneoImport\ImportCommand\ProductModel;

use Aa\AkeneoImport\ImportCommand\BaseCommandWithValues;
use Aa\AkeneoImport\ImportCommand\CommandInterface;

/**
 * Update Product model
 *
 * @see https://api.akeneo.com/api-reference.html#patch_product_models
 */
class UpdateOrCreateProductModel extends BaseCommandWithValues implements CommandInterface
{
    public function __construct(string $code)
    {
        $this->set('code', $code);
    }

    public function setFamilyVariant(?string $familyVariant): self
    {
        $this->set('family_variant', $familyVariant);

        return $this;
    }

    public function setParent(?string $parent): self
    {
        $this->set('parent', $parent);

        return $this;
    }

    public function setCategories(array $categories): self
    {
        $this->set('categories', $categories);

        return $this;
    }
}
