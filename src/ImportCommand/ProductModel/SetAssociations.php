<?php

namespace Aa\AkeneoImport\ImportCommand\ProductModel;

use Aa\AkeneoImport\ImportCommand\CommandInterface;


class SetAssociations implements CommandInterface, ProductModelFieldInterface
{
    /**
     * @var string
     */
    private $productModelCode;

    /**
     * @var array
     */
    private $associations;

    public function __construct(string $productModelCode, array $associations)
    {
        $this->productModelCode = $productModelCode;
        $this->associations = $associations;
    }

    public function getProductModelCode(): string
    {
        return $this->productModelCode;
    }

    public function getAssociations(): array
    {
        return $this->associations;
    }
}
