<?php

namespace Aa\AkeneoImport\ImportCommand\ProductModel;

use Aa\AkeneoImport\ImportCommand\CommandInterface;


class SetFamilyVariant implements CommandInterface, ProductModelFieldInterface
{
    /**
     * @var string
     */
    private $productModelCode;

    /**
     * @var string
     */
    private $familyVariant;

    public function __construct(string $productModelCode, ?string $familyVariant = null)
    {
        $this->productModelCode = $productModelCode;
        $this->familyVariant = $familyVariant;
    }

    public function getProductModelCode(): string
    {
        return $this->productModelCode;
    }

    public function getFamilyVariant(): ?string
    {
        return $this->familyVariant;
    }
}
