<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Brand;

class BrandFactory
{
    public function createEntity(array $informationBrand): Brand
    {
        $category = new Brand();
        $category->setName($informationBrand['name']);
        $category->setIcon($informationBrand['icon']);

        return $category;
    }
}