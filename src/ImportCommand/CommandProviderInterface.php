<?php

namespace Aa\AkeneoImport\ImportCommand;

interface CommandProviderInterface
{
    /**
     * @return \Aa\AkeneoImport\ImportCommand\CommandInterface[]
     */
    public function getCommands(): iterable;
}
