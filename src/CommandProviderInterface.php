<?php

namespace Aa\Akeneo\ImportCommands;

interface CommandProviderInterface
{
    /**
     * @return Traversable|\Aa\Akeneo\ImportCommands\CommandInterface[]
     */
    public function getCommands(): Traversable;
}
