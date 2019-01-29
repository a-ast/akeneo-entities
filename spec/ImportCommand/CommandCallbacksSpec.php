<?php

namespace spec\Aa\AkeneoImport\ImportCommand;

use Aa\AkeneoImport\ImportCommand\CommandInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CommandCallbacksSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(null, null);
    }

    function it_can_call_repeat(Command $command)
    {
        $repeat = new class {

            function __invoke(CommandInterface $c) {
                $c->call();
            }
        };

        $this->beConstructedWith($repeat, null);

        $command->call()->shouldBeCalled();

        $this->repeat($command->getWrappedObject());
    }

    function it_does_not_call_repeat_if_repeat_callback_not_set(TestCommand $command)
    {
        $command->call()->shouldNotBeCalled();

        $this->repeat($command->getWrappedObject());
    }

    function it_can_call_reject(TestCommand $command)
    {
        $reject = new class {

            function __invoke(CommandInterface $c) {
                $c->call();
            }
        };

        $this->beConstructedWith(null, $reject);

        $command->call()->shouldBeCalled();

        $this->reject($command->getWrappedObject());
    }

    function it_does_not_call_reject_if_reject_callback_not_set(Command $command)
    {

        $command->call()->shouldNotBeCalled();

        $this->reject($command->getWrappedObject());
    }
}

class Command implements CommandInterface
{
    public function call() {}
}

class Callback {};


