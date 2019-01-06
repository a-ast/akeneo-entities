<?php

namespace Aa\AkeneoImport\ImportCommand;

interface CommandBatchHandlerInterface
{
    public function handle(CommandBatchInterface $commands);

    public function shouldKeepCommandOrder(): bool;
}
