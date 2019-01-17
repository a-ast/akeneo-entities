<?php

namespace Aa\AkeneoImport\ImportCommand\Product;

use Aa\AkeneoImport\ImportCommand\CommandInterface;


class SetGroups implements CommandInterface, ProductFieldInterface
{
    /**
     * @var string
     */
    private $productIdentifier;

    /**
     * @var array
     */
    private $groups;

    public function __construct(string $productIdentifier, array $groups)
    {
        $this->productIdentifier = $productIdentifier;
        $this->groups = $groups;
    }

    public function getProductIdentifier(): string
    {
        return $this->productIdentifier;
    }

    public function getGroups(): array
    {
        return $this->groups;
    }
}
