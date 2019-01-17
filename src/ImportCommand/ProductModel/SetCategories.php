<?php

namespace Aa\AkeneoImport\ImportCommand\ProductModel;

use Aa\AkeneoImport\ImportCommand\CommandInterface;


class SetCategories implements CommandInterface, ProductModelFieldInterface
{
    /**
     * @var string
     */
    private $productModelCode;

    /**
     * @var array
     */
    private $categories;

    public function __construct(string $productModelCode, array $categories)
    {
        $this->productModelCode = $productModelCode;
        $this->categories = $categories;
    }

    public function getProductModelCode(): string
    {
        return $this->productModelCode;
    }

    public function getCategories(): array
    {
        return $this->categories;
    }
}
