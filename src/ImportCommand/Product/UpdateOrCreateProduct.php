<?php

namespace Aa\AkeneoImport\ImportCommand\Product;

use Aa\AkeneoImport\ImportCommand\BaseUpdateProductCommand;

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

    public function toArray(): array
    {
        if (count($this->values) > 0) {
            return array_merge($this->data, ['values' => $this->values]);
        }

        if (count($this->values) > 0) {
            return array_merge($this->data, ['values' => $this->values]);
        }

        return $this->data;
    }
}
