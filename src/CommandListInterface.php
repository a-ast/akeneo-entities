<?php

namespace Aa\Akeneo\ImportCommands;

interface CommandListInterface
{
    public function add(CommandInterface $command);
}
