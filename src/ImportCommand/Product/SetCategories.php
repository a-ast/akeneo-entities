<?php

namespace Aa\AkeneoImport\ImportCommand\Product;

use Aa\AkeneoImport\ImportCommand\CommandInterface;
use Aa\AkeneoImport\ImportCommand\CommandTypes;

class SetCategories implements CommandInterface
{
    /**
     * @var string
     */
    private $productIdentifier;

    /**
     * @var array
     */
    private $categories;

    /**
     */
    public function __construct(string $productIdentifier, array $categories)
    {
        $this->productIdentifier = $productIdentifier;
        $this->categories = $categories;
    }

    public function getProductIdentifier(): string
    {
        return $this->productIdentifier;
    }

    public function getCategories(): array
    {
        return $this->categories;
    }

    public function getType(): string
    {
        return CommandTypes::PRODUCT;
    }
}
