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
    use ValuesAwareTrait, CategoriesAwareTrait;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string|null
     */
    private $familyVariant;

    /**
     * @var string|null
     */
    private $parent;

    /**
     * @var DateTimeInterface
     */
    private $created;

    public function __construct(string $code, string $familyVariant)
    {
        $this->code = $code;
        $this->familyVariant = $familyVariant;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getFamilyVariant(): ?string
    {
        return $this->family;
    }

    public function setFamilyVariant(?string $familyVariant): self
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

    public function getCreated(): ?DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(?DateTimeInterface $created = null): self
    {
        $this->created = $created;

        return $this;
    }
}
