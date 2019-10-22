<?php

namespace App\ApiResponseDTO;

use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class ReleaseAuto
 */
class ReleaseAuto
{
    /**
     * @var int
     * @Groups({"group1", "group2"})
     */
    private $yearStart;

    /**
     * @var int|null
     * @Groups({"group1", "group2"})
     */
    private $yearStop;

    /**
     * @var string
     * @Groups({"group1", "group3"})
     */
    private $name;

    /**
     * @var string
     * @Groups("group3")
     */
    private $image;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
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
     * @param string|null $image
     *
     * @return ReleaseAuto
     */
    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return int
     */
    public function getYearStart(): int
    {
        return $this->yearStart;
    }

    /**
     * @param int $yearStart
     *
     * @return ReleaseAuto
     */
    public function setYearStart(int $yearStart): self
    {
        $this->yearStart = $yearStart;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getYearStop(): ?int
    {
        return $this->yearStop;
    }

    /**
     * @param int|null $yearStop
     *
     * @return ReleaseAuto
     */
    public function setYearStop(?int $yearStop): self
    {
        $this->yearStop = $yearStop;

        return $this;
    }
}
