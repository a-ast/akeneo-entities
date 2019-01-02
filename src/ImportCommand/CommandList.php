<?php

namespace Aa\AkeneoImport\ImportCommand;


class CommandList implements CommandListInterface
{
    /**
     * @var string
     */
    private $commandClass = '';

    /**
     * @var array
     */
    private $items;

    public function __construct(array $items = [])
    {
        if (count($items) > 0) {
            $this->commandClass = get_class($items[0]);

            // @todo: check that all items are of the same class
            // @todo: check that list contains commands - create spec
        }

        $this->items = $items;
    }

    public function getCommandClass(): string
    {
        return $this->commandClass;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function count()
    {
        return count($this->items);
    }
}
