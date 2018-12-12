<?php

namespace Aa\AkeneoImport\ImportCommands\Product;

use Aa\AkeneoImport\ImportCommands\CommandInterface;
use DateTimeInterface;

/**
 * Update Product
 *
 * @see https://api.akeneo.com/api-reference.html#patch_products__code_
 */
class UpdateProduct implements CommandInterface
{
    /**
     * @var string
     */
    private $identifier;

    /**
     * @var bool
     */
    private $enabled = true;

    /**
     * @var string|null
     */
    private $family;

    /**
     * @var array|string[]
     */
    private $categories = [];

    /**
     * @var array|string[]
     */
    private $groups = [];

    /**
     * @var string|null
     */
    private $parent;

    /**
     * @var array
     */
    private $values = [];

    /**
     * @var array
     *
     * @todo: should be object
     */
    private $associations = [];

    /**
     * @var DateTimeInterface
     */
    private $created;

    public function __construct(string $identifier)
    {
        $this->identifier = $identifier;
        // @todo: test setting null as created. Option: implement new DateTimeNormalizer that accepts nulls
//        $this->created = $created ?? new \DateTimeImmutable();
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function setFamily(?string $family): self
    {
        $this->family = $family;

        return $this;
    }

    public function getParent(): ?string
    {
        return $this->parent;
    }

    public function setParent(?string $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getCreated(): ?DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(?DateTimeInterface $created = null): self
    {
        $this->created = $created;

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

    public function getValues(): array
    {
        return $this->values;
    }

    public function setValues(array $values): self
    {
        $this->values = $values;

        return $this;
    }

    public function getAssociations(): array
    {
        return $this->associations;
    }

    public function setAssociations(array $associations): self
    {
        $this->associations = $associations;

        return $this;
    }

    public function getCategories(): array
    {
        return $this->categories;
    }

    public function setCategories(array $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    public function getGroups(): array
    {
        return $this->groups;
    }

    public function setGroups(array $groups): self
    {
        $this->groups = $groups;

        return $this;
    }
}
