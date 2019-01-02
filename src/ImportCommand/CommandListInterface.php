<?php

namespace Aa\AkeneoImport\ImportCommand;

use Countable;

interface CommandListInterface extends Countable
{
    public function getCommandClass(): string;

    public function getItems(): array;
}
