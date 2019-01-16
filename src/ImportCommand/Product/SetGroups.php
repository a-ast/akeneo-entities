<?php

namespace Aa\AkeneoImport\ImportCommand\Product;

use Aa\AkeneoImport\ImportCommand\CommandInterface;
use Aa\AkeneoImport\ImportCommand\CommandTypes;

class SetGroups implements CommandInterface
{
    /**
     * @var string
     */
    private $productIdentifier;

    /**
     * @var array
     */
    private $groups;

    /**
     */
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


    public function getType(): string
    {
        return CommandTypes::PRODUCT;
    }
}
