<?php

namespace Aa\Akeneo\Entities\Model;

use Traversable;

interface PimEntityProviderInterface
{
    /**
     * @return Traversable|PimEntityInterface[]
     */
    public function getEntities(): Traversable;
}
