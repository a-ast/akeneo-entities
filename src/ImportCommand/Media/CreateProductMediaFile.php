<?php

namespace Aa\AkeneoImport\ImportCommand\Media;

use Aa\AkeneoImport\ArrayFormattable;
use Aa\AkeneoImport\ImportCommand\CommandInterface;

/**
 * Create new media file
 *
 * @see https://api.akeneo.com/api-reference.html#post_media_files
 */
class CreateProductMediaFile implements ArrayFormattable, CommandInterface
{
    /**
     * @var string
     */
    private $fileName;

    /**
     * @var string
     */
    private $productIdentifier;

    /**
     * @var string
     */
    private $attributeCode;

    /**
     * @var null|string
     */
    private $scope;

    /**
     * @var null|string
     */
    private $locale;

    public function __construct(string $fileName, string $productIdentifier, string $attributeCode, ?string $scope = null, ?string $locale = null)
    {
        $this->fileName = $fileName;
        $this->productIdentifier = $productIdentifier;
        $this->attributeCode = $attributeCode;
        $this->scope = $scope;
        $this->locale = $locale;
    }

    public function toArray(): array
    {
        return [
            'media' => $this->fileName,
            'meta' => [
                'identifier' => $this->productIdentifier,
                'attribute' => $this->attributeCode,
                'scope' => $this->scope,
                'locale' => $this->locale,
                'type' => 'product',
            ]
        ];
    }
}
