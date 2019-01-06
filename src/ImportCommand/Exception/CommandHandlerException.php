<?php

namespace Aa\AkeneoImport\ImportCommand\Exception;

use RuntimeException;
use Throwable;

class CommandHandlerException extends RuntimeException
{
    /**
     * @var string
     */
    private $commandClass;

    /**
     * @var array
     */
    private $errors;

    public function __construct(string $message, string $commandClass, Throwable $previous = null)
    {
        parent::__construct($message, 0, $previous);

        $this->commandClass = $commandClass;
    }

    public function getCommandClass(): string
    {
        return $this->commandClass;
    }
}
