<?php

namespace Aa\Akeneo\ImportCommands;

interface CommandHandlerInterface
{
    public function handle(CommandListInterface $commands);
}
