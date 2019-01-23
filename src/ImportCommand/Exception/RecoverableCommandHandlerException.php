<?php

namespace Aa\AkeneoImport\ImportCommand\Exception;

use Throwable;

class RecoverableCommandHandlerException extends CommandHandlerException
{
    /**
     * @var array
     */
    private $commands;

    public function __construct($message = "", $code = 0, array $commands, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->commands = $commands;
    }

    public function getCommands(): array
    {
        return $this->commands;
    }
}
