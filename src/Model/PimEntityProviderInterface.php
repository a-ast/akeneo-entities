<?php

namespace Aa\AkeneoEntities\Model;

use Traversable;

interface PimEntityProviderInterface
{
    /**
     * @return Traversable|PimEntityInterface[]
     */
    public function getEntities(): Traversable;
}
