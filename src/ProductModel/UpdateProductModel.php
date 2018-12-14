<?php

namespace Aa\AkeneoImport\ImportCommands\Product;

use Aa\AkeneoImport\ImportCommands\ValuesAwareTrait;
use Aa\AkeneoImport\ImportCommands\CategoriesAwareTrait;
use Aa\AkeneoImport\ImportCommands\CommandWithValuesTrait;
use Aa\AkeneoImport\ImportCommands\CommandInterface;
use DateTimeInterface;

/**
 * Update Product model
 *
 * @see https://api.akeneo.com/api-reference.html#patch_product_models
 */
class UpdateProductModel implements CommandInterface
{
    use ValuesAwareTrait; //, CategoriesAwareTrait;

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

    public function setCreated(?DateTimeInterface $created = null): self
    {
        $this->set('created', $created);

        return $this;
    }
}
