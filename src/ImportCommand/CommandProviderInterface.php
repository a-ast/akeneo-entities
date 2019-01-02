<?php

namespace Aa\AkeneoImport\ImportCommand;

interface CommandProviderInterface
{
    /**
     * @return \Traversable|\Aa\AkeneoImport\ImportCommand\CommandInterface[]
     */
    public function getCommands(): \Traversable;
}
