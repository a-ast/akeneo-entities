<?php

namespace Aa\AkeneoImport\ImportCommands;

interface CommandListHandlerInterface
{
    public function handle(CommandListInterface $commands);

    public function shouldKeepCommandOrder(): bool;
}
