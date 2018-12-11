<?php

namespace Aa\AkeneoImport\ImportCommands;

interface CommandHandlerInterface
{
    public function handle(CommandListInterface $commands);
}
