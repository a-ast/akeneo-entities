<?php

namespace Aa\AkeneoImport\ImportCommands;

interface CommandListInterface
{
    public function add(CommandInterface $command);
}
