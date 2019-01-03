<?php

namespace Aa\AkeneoImport\ImportCommand\Category;

use Aa\AkeneoImport\ImportCommand\BaseCommand;

class UpdateOrCreateCategory extends BaseCommand
{
    public function __construct(string $code)
    {
        $this->set('code', $code);
    }

    public function setParent(string $parent): self
    {
        $this->set('parent', $parent);

        return $this;
    }

    public function setLabels(array $labels): self
    {
        $this->set('labels', $labels);

        return $this;
    }

    public function addLabel(string $label, string $locale): self
    {
        $this->data['labels'][$locale] = $label;

        return $this;
    }
}
