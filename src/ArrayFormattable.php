<?php

namespace Aa\AkeneoImport;

interface ArrayFormattable
{
    public function fromArray(array $data): ArrayFormattable;

    public function toArray(): array;
}
