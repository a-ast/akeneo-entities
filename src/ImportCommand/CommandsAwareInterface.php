<?php

namespace Aa\AkeneoImport\ImportCommand;

interface CommandsAwareInterface
{
    /*
     * @return CommandInterface[]|array
     */
    public function getExtraCommands(): array;
}
