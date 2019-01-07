<?php

namespace Aa\AkeneoImport\ImportCommand;


use Aa\AkeneoImport\ImportCommand\Exception\CommandBatchException;

class CommandBatch implements CommandBatchInterface
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
        if (0 === count($items)) {
            throw new CommandBatchException('Empty command batches are not allowed.');
        }

        $this->commandClass = get_class($items[0]);

        foreach ($items as $item) {

            if (!$item instanceof CommandInterface) {
                throw new CommandBatchException('Only instances of CommandInterface allowed.');
            }

            if ($this->commandClass !== get_class($item)) {
                throw new CommandBatchException('Commands of different types are not allowed');
            }
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
