<?php

namespace Aa\AkeneoEntities\Model;

class Product implements PimEntityInterface
{
    /**
     * @var string
     */
    private $identifier;

    /**
     * @var string
     */
    private $family;

    /**
     * @var null|string
     */
    private $modelCode;

    /**
     * @var bool
     */
    private $enabled;

    /**
     * @var \DateTimeInterface
     */
    private $created;

    public function __construct(string $identifier, ?string $family = null, ?string $modelCode = null, bool $enabled = false)
    {
        $this->family = $family;
        $this->identifier = $identifier;
        $this->modelCode = $modelCode;
        $this->enabled = $enabled;
        $this->created = new \DateTimeImmutable();
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function getFamily(): string
    {
        return $this->family;
    }

    public function setFamily(string $family): self
    {
        $this->family = $family;

        return $this;
    }

    public function getModelCode(): ?string
    {
        return $this->modelCode;
    }

    public function setModelCode(?string $modelCode): self
    {
        $this->modelCode = $modelCode;

        return $this;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getCreated(): \DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

}
