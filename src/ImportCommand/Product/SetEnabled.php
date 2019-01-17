<?php

namespace Aa\AkeneoImport\ImportCommand\Product;

use Aa\AkeneoImport\ImportCommand\CommandInterface;


class SetEnabled implements CommandInterface, ProductFieldInterface
{
    /**
     * @var string
     */
    private $productIdentifier;

    /**
     * @var bool
     */
    private $enabled;

    public function __construct(string $productIdentifier, bool $enabled)
    {
        $this->productIdentifier = $productIdentifier;
        $this->enabled = $enabled;
    }

    public function getProductIdentifier(): string
    {
        return $this->productIdentifier;
    }

    public function getEnabled(): bool
    {
        return $this->enabled;
    }
}
