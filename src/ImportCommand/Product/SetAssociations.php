<?php

namespace Aa\AkeneoImport\ImportCommand\Product;

use Aa\AkeneoImport\ImportCommand\CommandInterface;


class SetAssociations implements CommandInterface, ProductFieldInterface
{
    /**
     * @var string
     */
    private $productIdentifier;

    /**
     * @var array
     */
    private $associations;

    public function __construct(string $productIdentifier, array $associations)
    {
        $this->productIdentifier = $productIdentifier;
        $this->associations = $associations;
    }

    public function getProductIdentifier(): string
    {
        return $this->productIdentifier;
    }

    public function getAssociations(): array
    {
        return $this->associations;
    }
}
