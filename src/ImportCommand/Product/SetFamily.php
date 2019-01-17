<?php

namespace Aa\AkeneoImport\ImportCommand\Product;

use Aa\AkeneoImport\ImportCommand\CommandInterface;


class SetFamily implements CommandInterface, ProductFieldInterface
{
    /**
     * @var string
     */
    private $productIdentifier;

    /**
     * @var string
     */
    private $family;

    public function __construct(string $productIdentifier, ?string $family = null)
    {
        $this->productIdentifier = $productIdentifier;
        $this->family = $family;
    }

    public function getProductIdentifier(): string
    {
        return $this->productIdentifier;
    }

    public function getFamily(): ?string
    {
        return $this->family;
    }
}
