<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\MaxDepth;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReleaseAutoRepository")
 * @ORM\Table(name="release_auto")
 */
class ReleaseAuto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Model", inversedBy="release_auto")
     * @ORM\JoinColumn(name="model_id", referencedColumnName="id")
     * @Groups("group3")
     * @MaxDepth(1)
     */
    private $model;

    /**
     * @ORM\Column(type="integer")
     * @Groups("group3")
     */
    private $year_start;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups("group3")
     */
    private $year_stop;

    /**
     * @ORM\Column(name="name", length=100, type="string", nullable=true)
     * @Groups("group3")
     */
    private $name;

    /**
     * @ORM\Column(name="image", length=255, type="string")
     * @Groups("group3")
     */
    private $image;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * @param Model $model
     *
     * @return ReleaseAuto
     */
    public function setModel(Model $model): self
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return int
     */
    public function getYearStart(): int
    {
        return $this->year_start;
    }

    /**
     * @param int $year_start
     *
     * @return ReleaseAuto
     */
    public function setYearStart(int $year_start): self
    {
        $this->year_start = $year_start;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getYearStop(): ?int
    {
        return $this->year_stop;
    }

    /**
     * @param int|null $year_stop
     *
     * @return ReleaseAuto
     */
    public function setYearStop(?int $year_stop): self
    {
        $this->year_stop = $year_stop;

        return $this;
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
     *
     * @return ReleaseAuto
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string $image
     *
     * @return ReleaseAuto
     */
    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
