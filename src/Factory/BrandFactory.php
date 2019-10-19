<?php

namespace App\Factory;

use App\Entity\Brand;

/**
 * Class BrandFactory
 */
class BrandFactory
{
    /**
     * @param string $name
     * @param string $icon
     *
     * @return Brand
     */
    public function createBrand(string $name, string $icon): Brand
    {
        return (new Brand())
            ->setName($name)
            ->setIcon($icon);
    }
}
