<?php

namespace Aa\AkeneoImport\ImportCommands\Product;

use Aa\AkeneoImport\ImportCommands\BaseCommand;
use Aa\AkeneoImport\ImportCommands\ValuesAwareTrait;
use Aa\AkeneoImport\ImportCommands\CategoriesAwareTrait;
use Aa\AkeneoImport\ImportCommands\CommandInterface;
use DateTimeInterface;

/**
 * Update Product
 *
 * @see https://api.akeneo.com/api-reference.html#patch_products__code_
 */
class UpdateProduct extends BaseCommand implements CommandInterface
{
    use ValuesAwareTrait; //, CategoriesAwareTrait;

    public function __construct(string $identifier)
    {
        $this->set('identifier', $identifier);
    }

    public function setFamily(?string $family): self
    {
        $this->set('family', $family);

        return $this;
    }

    public function setParent(?string $parent): self
    {
        $this->set('parent', $parent);

        return $this;
    }

    public function setEnabled(?bool $enabled): self
    {
        $this->set('enabled', $enabled);

        return $this;
    }

    public function setCreated(?DateTimeInterface $created = null): self
    {
        $this->set('created', $created);

        return $this;
    }

    public function setAssociations(array $associations): self
    {
        $this->set('associations', $associations);

        return $this;
    }

    public function setGroups(array $groups): self
    {
        $this->set('groups', $groups);

        return $this;
    }
}
