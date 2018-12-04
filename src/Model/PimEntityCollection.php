<?php

namespace Aa\Akeneo\Entities\Model;

class PimEntityCollection extends \ArrayObject
{
    public function add(PimEntityInterface $entity)
    {
        $this->append($entity);
    }
}
