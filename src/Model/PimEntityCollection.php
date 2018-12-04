<?php

namespace Aa\AkeneoEntities\Model;

class PimEntityCollection extends \ArrayObject
{
    public function add(PimEntityInterface $entity)
    {
        $this->append($entity);
    }
}
