<?php

namespace Aa\AkeneoImport\Normalizer;

use Aa\AkeneoImport\ArrayFormattable;
use ReflectionClass;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\NameConverter\NameConverterInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CommandNormalizer implements NormalizerInterface, DenormalizerInterface
{
    use DenormalizerAwareTrait, NormalizerAwareTrait;

    /**
     * @var NameConverterInterface
     */
    private $nameConverter;

    public function __construct(?NameConverterInterface $nameConverter = null)
    {
        $nameConverter = $nameConverter ?? new CamelCaseToSnakeCaseNameConverter();

        $this->nameConverter = $nameConverter;
    }

    /**
     * @param ArrayFormattable $object
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $standardFormat = $object->toArray();

        foreach ($standardFormat as &$item) {
            $item = $this->normalizer->normalize($item, $format, $context);
        }

        return $standardFormat;
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof ArrayFormattable;
    }


    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $reflectionClass = new ReflectionClass($class);

        $constructorParameters = $reflectionClass->getConstructor()->getParameters();

        foreach ($constructorParameters as $constructorParameter) {
            $parameterName = $this->nameConverter->denormalize($constructorParameter->getName());

            if (!isset($data[$parameterName])) {
                continue;
            }

            $parameterClass = $constructorParameter->getClass();

            if (null === $parameterClass) {
                $arguments[] = $data[$parameterName];

                continue;
            }

            $arguments[] = $this->denormalizer->denormalize($data[$parameterName], $parameterClass->getName(), $format, $context);
        }

        $command = $reflectionClass->newInstanceArgs($arguments);

        foreach ($data as $fieldName => &$item) {

            $methodName = sprintf('set%s', ucfirst($this->nameConverter->normalize($fieldName)));

            if ($reflectionClass->hasMethod($methodName)) {

                $method = $reflectionClass->getMethod($methodName);

                $methodParameters = $method->getParameters();

                $setterParameter = $methodParameters[0];

                $parameterClass = $setterParameter->getClass();

                if (null !== $parameterClass) {
                    $item = $this->denormalizer->denormalize($item, $parameterClass->getName(), $format, $context);
                }

                $method->invoke($command, $item);

            }
        }

        return $command;
    }

    public function supportsDenormalization($data, $type, $format = null)
    {
        if (!class_exists($type)) {
            return false;
        }

        $reflectionClass = new ReflectionClass($type);

        return $reflectionClass->implementsInterface(ArrayFormattable::class);
    }
}
