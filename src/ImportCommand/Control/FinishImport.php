<?php

namespace Aa\AkeneoImport\ImportCommand\Control;

use Aa\AkeneoImport\ImportCommand\CommandInterface;

class FinishImport implements CommandInterface
{
    public function getType(): string
    {
        return '[control]';
    }
}
