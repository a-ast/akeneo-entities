<?php

namespace Aa\AkeneoImport\ImportCommand;

use Aa\AkeneoImport\CommandBus\CommandPromise;

interface AsyncCommandHandlerInterface
{
    public function handle(CommandPromise $commandPromise);
}
