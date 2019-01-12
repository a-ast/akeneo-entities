<?php

namespace Aa\AkeneoImport\ImportCommand\Product;

use Aa\AkeneoImport\ImportCommand\BaseUpdateProductCommand;
use Aa\AkeneoImport\ImportCommand\Media\CreateProductMediaFile;

/**
 * Delete Product
 *
 * @see https://api.akeneo.com/api-reference.html#delete_products__code_
 */
class DeleteProduct extends BaseUpdateProductCommand
{
    public function __construct(string $identifier)
    {
        $this->set('identifier', $identifier);
    }
}
