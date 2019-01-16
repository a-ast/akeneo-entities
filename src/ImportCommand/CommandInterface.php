<?php

namespace Aa\AkeneoImport\ImportCommand;

interface CommandInterface
{
    public function getType(): string;
}
