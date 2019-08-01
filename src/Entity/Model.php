<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ModelRepository")
 * @ORM\Table(name="model")
 */
class Model
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Brand", inversedBy="brand")
     * @ORM\JoinColumn(name="brand_id", referencedColumnName="id")
     */
    private $brand;

    /**
     * One model car has One release.
     * @ORM\OneToMany(targetEntity="App\Entity\ReleaseAuto", mappedBy="model", cascade={"persist", "remove"})
     */
    private $releases;

    public function __construct()
    {
        $this->releases = new ArrayCollection();
    }

    /**
     * @return Collection|Model[]
     */
    public function getReleases(): Collection
    {
        return $this->releases;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): Model
    {
        $this->name = $name;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(Brand $brand): Model
    {
        $this->brand = $brand;

        return $this;
    }
}
