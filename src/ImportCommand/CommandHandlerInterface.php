<?php

namespace Aa\AkeneoImport\ImportCommand;

interface CommandHandlerInterface
{
    public function handle(CommandBatchInterface $commands);

    public function shouldKeepCommandOrder(): bool;
}
