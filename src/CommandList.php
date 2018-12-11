<?php

namespace Aa\AkeneoImport\ImportCommands;

class CommandList extends \ArrayObject implements CommandListInterface
{
    public function add(CommandInterface $command)
    {
        $this->append($command);
    }
}
