<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReleasesAutoRepository")
 * @ORM\Table(name="releases_auto")
 */
class ReleasesAuto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Models", inversedBy="releases_auto")
     * @ORM\JoinColumn(name="model_id", referencedColumnName="id")
     */
    private $model;

    /**
     * @ORM\Column(type="integer")
     */
    private $year_start;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $year_stop;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?Models
    {
        return $this->model;
    }

    public function setModel(int $model): ReleasesAuto
    {
        $this->model = $model;

        return $this;
    }

    public function getYearStart(): ?int
    {
        return $this->year_start;
    }

    public function setYearStart(int $year_start): ReleasesAuto
    {
        $this->year_start = $year_start;

        return $this;
    }

    public function getYearStop(): ?int
    {
        return $this->year_stop;
    }

    public function setYearStop(?int $year_stop): ReleasesAuto
    {
        $this->year_stop = $year_stop;

        return $this;
    }
}
