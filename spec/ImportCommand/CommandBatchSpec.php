<?php

namespace spec\Aa\AkeneoImport\ImportCommand;

use Aa\AkeneoImport\ImportCommand\CommandBatch;
use Aa\AkeneoImport\ImportCommand\CommandInterface;
use Aa\AkeneoImport\ImportCommand\Exception\CommandBatchException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use spec\Aa\AkeneoImport\fixture\TestCommand;

class CommandBatchSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(CommandBatch::class);
    }

    function it_gets_a_command_class_from_non_empty_batch()
    {
        $commands = [
            new TestCommand('1'),
            new TestCommand('2'),
        ];

        $this->beConstructedWith($commands);
        $this->getCommandClass()->shouldReturn(TestCommand::class);
    }

    function it_does_not_allow_to_create_empty_batch()
    {
        $this->beConstructedWith([]);
        $this->shouldThrow(CommandBatchException::class)->duringInstantiation();
    }

    function it_does_not_allow_to_add_items_that_are_not_commands()
    {
        $commands = [
            new class {},
        ];

        $this->beConstructedWith($commands);
        $this->shouldThrow(CommandBatchException::class)->duringInstantiation();
    }


    function it_does_not_allow_to_mix_commands_of_different_types()
    {
        $commands = [
            new TestCommand('1'),
            new class implements CommandInterface {},
        ];

        $this->beConstructedWith($commands);
        $this->shouldThrow(CommandBatchException::class)->duringInstantiation();
    }
}
