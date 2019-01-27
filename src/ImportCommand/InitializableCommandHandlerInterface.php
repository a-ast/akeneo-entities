<?php

namespace Aa\AkeneoImport\ImportCommand;

interface InitializableCommandHandlerInterface
{
    public function setUp();

    public function tearDown();
}
