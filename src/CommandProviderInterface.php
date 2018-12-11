<?php

namespace Aa\AkeneoImport\ImportCommands;

interface CommandProviderInterface
{
    /**
     * @return Traversable|\Aa\AkeneoImport\ImportCommands\CommandInterface[]
     */
    public function getCommands(): Traversable;
}
