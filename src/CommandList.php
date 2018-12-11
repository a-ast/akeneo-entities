<?php

namespace Aa\AkeneoImport\ImportCommands;

class CommandList extends \ArrayObject implements CommandListInterface
{
    public function __construct(array $items = [])
    {
        parent::__construct($items);
    }

    public function add(CommandInterface $command)
    {
        $this->append($command);
    }
}
