<?php

namespace Aa\AkeneoImport\ImportCommand\Category;

/**
 * Update or create categories
 *
 * @see: https://api.akeneo.com/api-reference.html#patch_categories
 */
class CategoryCommandBuilder
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var \Aa\AkeneoImport\ImportCommand\CommandInterface[]|array
     */
    private $commands = [];

    public function __construct(string $code)
    {
        $this->code = $code;
    }

    public function setParent(?string $parent): self
    {
        $this->commands[] = new SetParent($this->code, $parent);

        return $this;
    }

    public function setLabels(array $labels): self
    {
        $this->commands[] = new SetLabels($this->code, $labels);

        return $this;
    }
}
