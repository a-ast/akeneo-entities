<?php

namespace Aa\Akeneo\ImportCommands;

class CommandCollection extends \ArrayObject implements CommandCollectionInterface
{
    public function add(CommandInterface $command)
    {
        $this->append($command);
    }
}
