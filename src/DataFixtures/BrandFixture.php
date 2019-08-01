<?php

declare(strict_types=1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Brand;

class BrandFixture extends Fixture
{
    public const BRAND_1_REFERENCE = 'brands_1';
    public const BRAND_2_REFERENCE = 'brands_2';
    public const BRAND_3_REFERENCE = 'brands_3';
    public const BRAND_4_REFERENCE = 'brands_4';
    public const BRAND_5_REFERENCE = 'brands_5';
    public const BRAND_6_REFERENCE = 'brands_6';
    public const BRAND_7_REFERENCE = 'brands_7';
    public const BRAND_8_REFERENCE = 'brands_8';
    public const BRAND_9_REFERENCE = 'brands_9';
    public const BRAND_10_REFERENCE = 'brands_10';

    public function load(ObjectManager $manager): void
    {
        foreach ($this->getData() as $data) {
            $brand = new Brand();
            $brand->setName($data['name']);
            $brand->setIcon($data['icon']);

            $manager->persist($brand);

            $this->addReference($data['reference'], $brand);
        }

        $manager->flush();
    }

    private function getData(): iterable
    {
        return  [
            [
                'name' => 'AC',
                'reference' => self::BRAND_1_REFERENCE,
                'icon' => 'AC image'
            ],
            [
                'name' => 'Alfa Romeo',
                'reference' => self::BRAND_2_REFERENCE,
                'icon' => 'Alfa Romeo image'
            ],
            [
                'name' => 'Acura',
                'reference' => self::BRAND_3_REFERENCE,
                'icon' => 'Acura image'
            ],
            [
                'name' => 'Audi',
                'reference' => self::BRAND_4_REFERENCE,
                'icon' => 'Audi image'
            ],
            [
                'name' => 'Aston Martin',
                'reference' => self::BRAND_5_REFERENCE,
                'icon' => 'Aston Martin image'
            ],
            [
                'name' => 'BMW',
                'reference' => self::BRAND_6_REFERENCE,
                'icon' => 'BMW image'
            ],
            [
                'name' => 'Chery',
                'reference' => self::BRAND_7_REFERENCE,
                'icon' => 'Chery image'
            ],
            [
                'name' => 'Chevrolet',
                'reference' => self::BRAND_8_REFERENCE,
                'icon' => 'Chevrolet image'
            ],
            [
                'name' => 'Citroen',
                'reference' => self::BRAND_9_REFERENCE,
                'icon' => 'Citroen image'
            ],
            [
                'name' => 'Daewoo',
                'reference' => self::BRAND_10_REFERENCE,
                'icon' => 'Daewoo image'
            ]
        ];
    }
}
