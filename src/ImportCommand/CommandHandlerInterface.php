<?php

namespace Aa\AkeneoImport\ImportCommand;

interface CommandHandlerInterface
{
    public function handle(CommandInterface $command, CommandCallbacks $callbacks = null);
}
