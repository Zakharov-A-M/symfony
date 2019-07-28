<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BrandsRepository")
 * @ORM\Table(name="brands")
 */
class Brands
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $icon;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Models", mappedBy="brands", cascade={"persist", "remove"})
     */
    private $models;

    public function __construct()
    {
        $this->models = new ArrayCollection();
    }

    /**
     * @return Collection|Models[]
     */
    public function getModels(): Collection
    {
        return $this->models;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): Brands
    {
        $this->name = $name;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): Brands
    {
        $this->icon = $icon;

        return $this;
    }
}
