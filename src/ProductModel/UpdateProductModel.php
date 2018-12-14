<?php

namespace Aa\AkeneoImport\ImportCommands\ProductModel;

use Aa\AkeneoImport\ImportCommands\BaseCommand;
use Aa\AkeneoImport\ImportCommands\ValuesAwareTrait;
use Aa\AkeneoImport\ImportCommands\CategoriesAwareTrait;
use Aa\AkeneoImport\ImportCommands\CommandInterface;

/**
 * Update Product model
 *
 * @see https://api.akeneo.com/api-reference.html#patch_product_models
 */
class UpdateProductModel extends BaseCommand implements CommandInterface
{
    use ValuesAwareTrait, CategoriesAwareTrait;

    public function __construct(string $code, string $familyVariant)
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
}
