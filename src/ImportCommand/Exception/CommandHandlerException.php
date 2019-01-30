<?php

namespace Aa\AkeneoImport\ImportCommand\Exception;

use Aa\AkeneoImport\ImportCommand\CommandInterface;
use RuntimeException;
use Throwable;

class CommandHandlerException extends RuntimeException
{
    /**
     * @var CommandInterface
     */
    private $command;

    /**
     * @var array
     */
    private $errors;

    public function __construct($message = '', $code = 0, CommandInterface $command, array $errors, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->command = $command;
        $this->errors = $errors;
    }

    public function getCommand(): CommandInterface
    {
        return $this->command;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
