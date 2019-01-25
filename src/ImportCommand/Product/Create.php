<?php

namespace Aa\AkeneoImport\ImportCommand\Product;

use Aa\AkeneoImport\ImportCommand\CommandInterface;


class Create implements CommandInterface, ProductFieldInterface
{
    /**
     * @var string
     */
    private $productIdentifier;

    public function __construct(string $productIdentifier, array $associations)
    {
        $this->productIdentifier = $productIdentifier;
    }

    public function getProductIdentifier(): string
    {
        return $this->productIdentifier;
    }
}
