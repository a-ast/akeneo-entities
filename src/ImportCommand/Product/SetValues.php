<?php

namespace Aa\AkeneoImport\ImportCommand\Product;

use Aa\AkeneoImport\ImportCommand\CommandInterface;


class SetValues implements CommandInterface, ProductFieldInterface
{
    /**
     * @var string
     */
    private $productIdentifier;

    /**
     * @var array
     */
    private $values;

    public function __construct(string $productIdentifier, array $values)
    {
        $this->productIdentifier = $productIdentifier;
        $this->values = $values;
    }

    public function getProductIdentifier(): string
    {
        return $this->productIdentifier;
    }

    public function getValues(): array
    {
        return $this->values;
    }
}
