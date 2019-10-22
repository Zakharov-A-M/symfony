<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @Groups("group3")
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Brand", inversedBy="brand")
     * @ORM\JoinColumn(name="brand_id", referencedColumnName="id")
     * @Groups("group3")
     * @MaxDepth(1)
     */
    private $brand;

    /**
     * One model car has One release.
     * @ORM\OneToMany(targetEntity="App\Entity\ReleaseAuto", mappedBy="model", cascade={"persist", "remove"})
     */
    private $releases;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->releases = new ArrayCollection();
    }

    /**
     * @return Collection
     */
    public function getReleases(): Collection
    {
        return $this->releases;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Model
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Brand
     */
    public function getBrand(): Brand
    {
        return $this->brand;
    }

    /**
     * @param Brand $brand
     * @return Model
     */
    public function setBrand(Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }
}
