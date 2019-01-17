<?php

namespace Aa\AkeneoImport\ImportCommand\Category;

use Aa\AkeneoImport\ImportCommand\CommandInterface;

class SetLabels implements CommandInterface, CategoryFieldInterface
{
    /**
     * @var string
     */
    private $categoryCode;

    /**
     * @var array
     */
    private $labels;

    public function __construct(string $categoryCode, ?array $labels = null)
    {
        $this->categoryCode = $categoryCode;
        $this->labels = $labels;
    }

    public function getCategoryCode(): string
    {
        return $this->categoryCode;
    }

    public function getLabels(): array
    {
        return $this->labels;
    }
}
