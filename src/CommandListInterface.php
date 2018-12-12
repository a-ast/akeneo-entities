<?php

namespace Aa\AkeneoImport\ImportCommands;

use Countable;

interface CommandListInterface extends Countable
{
    public function getCommandClass(): string;

    public function getItems(): array;
}
