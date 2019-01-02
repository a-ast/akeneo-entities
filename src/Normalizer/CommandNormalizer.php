<?php

namespace Aa\AkeneoImport\Normalizer;

use Aa\AkeneoImport\ArrayFormattable;
use ReflectionClass;
use spec\Aa\AkeneoImport\fixture\TestCommand;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CommandNormalizer implements NormalizerInterface, DenormalizerInterface
{
    use DenormalizerAwareTrait, NormalizerAwareTrait;

    /**
     * @param ArrayFormattable $object
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $standardFormat = $object->toArray();

        // @todo: what about values in data

        // check if the command supports values and then iterate all values



        foreach ($standardFormat as &$item) {
            $item = $this->normalizer->normalize($item, $format, $context);
        }

        return $standardFormat;
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof ArrayFormattable;
    }


    public function denormalize(
        $data,
        $class,
        $format = null,
        array $context = []
    ) {

        // @todo: here we actually need ObjectNormalizer
        // iterate all setters to obtain their argument types
        // then denormalize to that type
        // check if it support values

        //$reflectionClass = new ReflectionClass($class);



        // $object = $this->instantiateObject($normalizedData, $class, $context, $reflectionClass, $allowedAttributes, $format);



//        foreach ($data as &$item) {
//            $item = $this->denormalizer->denormalize($item, $format, $context);
//        }

        $command = new $class('sss');
        $command->fromStandardFormat($data);

        return $command;

    }


    public function supportsDenormalization($data, $type, $format = null)
    {
        // @todo: check via reflection that this command supports standard formattable

        var_dump($type);

        return $type === TestCommand::class;

    }
}
