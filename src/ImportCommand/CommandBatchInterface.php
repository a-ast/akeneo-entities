<?php

namespace Aa\AkeneoImport\ImportCommand;

use Countable;

interface CommandBatchInterface extends Countable
{
    public function getCommandClass(): string;

    public function getItems(): array;
}
