<?php

namespace Aa\AkeneoImport\ImportCommand\ProductModel;

use Aa\AkeneoImport\ImportCommand\CommandInterface;


class SetParent implements CommandInterface, ProductModelFieldInterface
{
    /**
     * @var string
     */
    private $productModelCode;

    /**
     * @var string
     */
    private $parent;

    public function __construct(string $productModelCode, ?string $parent = null)
    {
        $this->productModelCode = $productModelCode;
        $this->parent = $parent;
    }

    public function getProductModelCode(): string
    {
        return $this->productModelCode;
    }

    public function getParent(): ?string
    {
        return $this->parent;
    }
}
