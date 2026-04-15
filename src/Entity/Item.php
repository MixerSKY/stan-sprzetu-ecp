<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $category = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column]
    private ?int $minLevel = null;

    #[ORM\Column]
    private ?int $midLevel = null;

    #[ORM\Column]
    private ?int $okLevel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getMinLevel(): ?int
    {
        return $this->minLevel;
    }

    public function setMinLevel(int $minLevel): static
    {
        $this->minLevel = $minLevel;

        return $this;
    }

    public function getMidLevel(): ?int
    {
        return $this->midLevel;
    }

    public function setMidLevel(int $midLevel): static
    {
        $this->midLevel = $midLevel;

        return $this;
    }

    public function getOkLevel(): ?int
    {
        return $this->okLevel;
    }

    public function setOkLevel(int $okLevel): static
    {
        $this->okLevel = $okLevel;

        return $this;
    }
}
