<?php

namespace Aa\AkeneoImport\ImportCommands;

trait CategoriesAwareTrait
{
    /**
     * @var array|string[]
     */
    private $categories = [];

    public function getCategories(): array
    {
        return $this->categories;
    }

    public function setCategories(array $categories): self
    {
        $this->categories = $categories;

        return $this;
    }
}
