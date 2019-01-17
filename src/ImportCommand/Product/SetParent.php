<?php

namespace Aa\AkeneoImport\ImportCommand\Product;

use Aa\AkeneoImport\ImportCommand\CommandInterface;


class SetParent implements CommandInterface, ProductFieldInterface
{
    /**
     * @var string
     */
    private $productIdentifier;

    /**
     * @var string
     */
    private $parent;

    public function __construct(string $productIdentifier, ?string $parent = null)
    {
        $this->productIdentifier = $productIdentifier;
        $this->parent = $parent;
    }

    public function getProductIdentifier(): string
    {
        return $this->productIdentifier;
    }

    public function getParent(): ?string
    {
        return $this->parent;
    }
}
