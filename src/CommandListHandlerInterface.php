<?php

namespace Aa\AkeneoImport\ImportCommands;

interface CommandListHandlerInterface
{
    public function handle(CommandListInterface $commands);
}
