<?php

namespace Aa\AkeneoImport\ImportCommands;

trait CategoriesAwareTrait
{
    public function setCategories(array $categories): self
    {
        $this->set('categories', $categories);

        return $this;
    }
}
