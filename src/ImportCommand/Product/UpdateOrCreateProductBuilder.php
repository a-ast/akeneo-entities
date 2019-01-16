<?php

namespace Aa\AkeneoImport\ImportCommand\Product;

use Aa\AkeneoImport\ImportCommand\BaseUpdateProductCommand;
use Aa\AkeneoImport\ImportCommand\Media\CreateProductMediaFile;

/**
 * Update Product
 *
 * @see https://api.akeneo.com/api-reference.html#patch_products__code_
 */
class UpdateOrCreateProductBuilder
{
    /**
     * @var string
     */
    private $identifier;

    /**
     * @var \Aa\AkeneoImport\ImportCommand\CommandInterface[]|array
     */
    private $commands = [];

    public function __construct(string $identifier)
    {
        $this->identifier = $identifier;
    }

    public function setFamily(?string $family): self
    {
        $this->commands[] = new SetFamily($this->identifier, $family);

        return $this;
    }

    public function setParent(?string $parent): self
    {
        $this->commands[] = new SetParent($this->identifier, $parent);

        return $this;
    }

    public function setEnabled(?bool $enabled): self
    {
        $this->commands[] = new SetParent($this->identifier, $enabled);

        return $this;
    }

    public function setGroups(array $groups): self
    {
        $this->commands[] = new SetParent($this->identifier, $groups);

        return $this;
    }

    public function setCategories(array $categories): self
    {
        $this->commands[] = new SetParent($this->identifier, $categories);

        return $this;
    }

    public function addMediaValue(string $attributeCode, string $fileName, ?string $locale = null, ?string $scope = null): self
    {
        $this->commands[] = new CreateProductMediaFile($fileName, $this->identifier, $attributeCode, $scope, $locale);

        return $this;
    }

    public function getCommands(): iterable
    {
        return $this->commands;
    }
}
