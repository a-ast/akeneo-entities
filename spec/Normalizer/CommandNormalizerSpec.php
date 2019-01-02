<?php

namespace spec\Aa\AkeneoImport\Normalizer;

use Aa\AkeneoImport\Normalizer\CommandNormalizer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use spec\Aa\AkeneoImport\fixture\TestCommand;
use spec\Aa\AkeneoImport\fixture\TestCommandWithConstructor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class CommandNormalizerSpec extends ObjectBehavior
{
    function let()
    {
        $serializer = $this->getSerializer();

        $this->setNormalizer($serializer);
        $this->setDenormalizer($serializer);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CommandNormalizer::class);
    }

    function it_normalizes_a_command_with_constructor()
    {
        $command = new TestCommand('test');

        $this
            ->normalize($command, 'standard')
            ->shouldReturn(['identifier' => 'test']);
    }

    function it_normalizes_a_command_with_values()
    {
        $command = new TestCommand('test');
        $command
            ->addValue('string_value', 'string', 'en_EN', 'shop')
            ->addValue('bool_value', true)
            ->addValue('date_value', new \DateTime('2020-10-10 10:10'));

        $this
            ->normalize($command, 'standard')
            ->shouldReturn([
                'identifier' => 'test',
                'values' => [
                    'string_value' => [
                        [
                            'data' => 'string',
                            'locale' => 'en_EN',
                            'scope' => 'shop',
                        ],
                    ],
                    'bool_value' => [
                        [
                            'data' => true,
                            'locale' => null,
                            'scope' => null,
                        ],
                    ],
                    'date_value' => [
                        [
                            'data' => '2020-10-10T10:10:00+00:00',
                            'locale' => null,
                            'scope' => null,
                        ],
                    ],
                ],
            ]);
    }

    function it_normalizes_a_command_with_datetimes()
    {
        $command = new TestCommand('test');
        $command->setDate(new \DateTime('2020-10-10 10:10'));

        $this
            ->normalize($command, 'standard')
            ->shouldReturn([
                'identifier' => 'test',
                'date' => '2020-10-10T10:10:00+00:00',
            ]);
    }

    function it_denormalizes_a_command()
    {
        $expectedCommand = new TestCommand('test');
        $expectedCommand->setDate(new \DateTime('2020-10-10 10:10'));

        $data = [
            'identifier' => 'test',
            'date' => '2020-10-10T10:10:00+00:00',
        ];

        $command = $this
            ->denormalize($data, TestCommand::class, 'standard');

        $command->shouldBeLike($expectedCommand);
    }

    function it_denormalizes_a_command_with_complex_constructor()
    {
        $expectedCommand = new TestCommandWithConstructor('test', new \DateTime('2020-10-10 10:10'), ['a', 'b', 'c',]);

        $data = [
            'identifier' => 'test',
            'date' => '2020-10-10T10:10:00+00:00',
            'data' => ['a', 'b', 'c',],
        ];

        $command = $this
            ->denormalize($data, TestCommandWithConstructor::class, 'standard');

        $command->shouldBeLike($expectedCommand);
    }

    private function getSerializer(): SerializerInterface
    {
        $normalizers = [
            $this->getWrappedObject(),
            new DateTimeNormalizer(),
            new ArrayDenormalizer(),
        ];

        $encoders = [
            new JsonEncoder(),
        ];

        $serializer = new Serializer($normalizers, $encoders);

        return $serializer;
    }
}
