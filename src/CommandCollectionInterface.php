<?php

namespace Aa\Akeneo\ImportCommands;

interface CommandCollectionInterface
{
    public function add(CommandInterface $command);
}
