<?php

namespace App\ApiResponseDTO;

/**
 * Class Brand
 */
class Brand
{
    /** @var string */
    private $brand;

    /** @var string */
    private $icon;

    /** @var Model[] */
    private $model;

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     *
     * @return $this
     */
    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     *
     * @return $this
     */
    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @return Model[]
     */
    public function getModel(): array
    {
        return $this->model;
    }

    /**
     * @param Model[] $model
     *
     * @return $this
     */
    public function setModel(array $model): self
    {
        $this->model = $model;

        return $this;
    }
}
