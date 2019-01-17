<?php

namespace Aa\AkeneoImport\ImportCommand;

interface CommandHandlerInterface
{
    public function handle(CommandInterface $commands);
}
