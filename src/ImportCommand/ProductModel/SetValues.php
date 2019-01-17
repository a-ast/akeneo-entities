<?php

namespace Aa\AkeneoImport\ImportCommand\ProductModel;

use Aa\AkeneoImport\ImportCommand\CommandInterface;


class SetValues implements CommandInterface, ProductModelFieldInterface
{
    /**
     * @var string
     */
    private $productModelCode;

    /**
     * @var array
     */
    private $values;

    public function __construct(string $productModelCode, array $values)
    {
        $this->productModelCode = $productModelCode;
        $this->values = $values;
    }

    public function getProductModelCode(): string
    {
        return $this->productModelCode;
    }

    public function getValues(): array
    {
        return $this->values;
    }
}
