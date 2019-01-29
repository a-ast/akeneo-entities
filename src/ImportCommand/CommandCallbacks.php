<?php

namespace Aa\AkeneoImport\ImportCommand;

class CommandCallbacks
{
    /**
     * @var callable
     */
    private $onRepeat;

    /**
     * @var callable
     */
    private $onReject;

    public function __construct(callable $onRepeat = null, callable $onReject = null)
    {
        $this->onRepeat = $onRepeat;
        $this->onReject = $onReject;
    }

    public function repeat(CommandInterface $command)
    {
        if (null === $this->onRepeat) {
            return;
        }

        ($this->onRepeat)($command);
    }

    public function reject(CommandInterface $command, string $message = '', int $code = 0, array $errors = [])
    {
        if (null === $this->onReject) {
            return;
        }

        ($this->onReject)($command, $message, $code, $errors);
    }
}
