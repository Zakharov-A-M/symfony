<?php

namespace App\ApiResponseDTO;

/**
 * Class Model
 */
class Model
{
    /** @var string */
    private $name;

    /** @var ReleaseAuto[] */
    private $release;

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
     * @return array
     */
    public function getReleaseAuto(): array
    {
        return $this->release;
    }

    /**
     * @param array $release
     *
     * @return $this
     */
    public function setReleaseAuto(array $release): self
    {
        $this->release = $release;

        return $this;
    }
}
