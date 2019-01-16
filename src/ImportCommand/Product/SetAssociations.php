<?php

namespace Aa\AkeneoImport\ImportCommand\Product;

use Aa\AkeneoImport\ImportCommand\CommandInterface;
use Aa\AkeneoImport\ImportCommand\CommandTypes;

class SetAssociations implements CommandInterface
{
    /**
     * @var string
     */
    private $productIdentifier;

    /**
     * @var array
     */
    private $associations;

    /**
     */
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

    public function getType(): string
    {
        return CommandTypes::PRODUCT;
    }
}
