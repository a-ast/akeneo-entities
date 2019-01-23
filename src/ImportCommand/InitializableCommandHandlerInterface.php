<?php

namespace Aa\AkeneoImport\ImportCommand;

interface InitializableCommandHandlerInterface extends CommandHandlerInterface
{
    public function setUp();

    public function tearDown();
}
