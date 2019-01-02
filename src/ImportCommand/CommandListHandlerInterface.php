<?php

namespace Aa\AkeneoImport\ImportCommand;

interface CommandListHandlerInterface
{
    public function handle(CommandListInterface $commands);

    public function shouldKeepCommandOrder(): bool;
}
