<?php

namespace Aa\AkeneoImport\ImportCommand\Media;

use Aa\AkeneoImport\ArrayFormattable;
use Aa\AkeneoImport\ImportCommand\CommandInterface;

/**
 * Create new media file
 *
 * @see https://api.akeneo.com/api-reference.html#post_media_files
 */
class CreateProductModelMediaFile implements CommandInterface
{
    /**
     * @var string
     */
    private $fileName;

    /**
     * @var string
     */
    private $productModelCode;

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

    public function __construct(string $productModelCode, string $fileName, string $attributeCode, ?string $scope = null, ?string $locale = null)
    {
        $this->fileName = $fileName;
        $this->productModelCode = $productModelCode;
        $this->attributeCode = $attributeCode;
        $this->scope = $scope;
        $this->locale = $locale;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function getProductModelCode(): string
    {
        return $this->productModelCode;
    }

    public function getAttributeCode(): string
    {
        return $this->attributeCode;
    }

    public function getScope(): ?string
    {
        return $this->scope;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }
}
