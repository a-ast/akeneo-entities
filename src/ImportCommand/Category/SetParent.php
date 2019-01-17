<?php

namespace Aa\AkeneoImport\ImportCommand\Category;

use Aa\AkeneoImport\ImportCommand\CommandInterface;

class SetParent implements CommandInterface, CategoryFieldInterface
{
    /**
     * @var string
     */
    private $categoryCode;

    /**
     * @var string
     */
    private $parent;

    public function __construct(string $categoryCode, ?string $parent = null)
    {
        $this->categoryCode = $categoryCode;
        $this->parent = $parent;
    }

    public function getCategoryCode(): string
    {
        return $this->categoryCode;
    }

    public function getParent(): ?string
    {
        return $this->parent;
    }
}
