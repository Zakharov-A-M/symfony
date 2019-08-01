<?php

declare(strict_types=1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Model;

class ModelFixture extends Fixture implements DependentFixtureInterface
{
    public const MODEL_1_REFERENCE = 'model_1';
    public const MODEL_2_REFERENCE = 'model_2';
    public const MODEL_3_REFERENCE = 'model_3';
    public const MODEL_4_REFERENCE = 'model_4';
    public const MODEL_5_REFERENCE = 'model_5';
    public const MODEL_6_REFERENCE = 'model_6';
    public const MODEL_7_REFERENCE = 'model_7';
    public const MODEL_8_REFERENCE = 'model_8';
    public const MODEL_9_REFERENCE = 'model_9';
    public const MODEL_10_REFERENCE = 'model_10';

    public function load(ObjectManager $manager): void
    {
        foreach ($this->getData() as $data) {
            $model = new Model();
            $model->setName($data['name']);
            $model->setBrand($data['brand']);
            $manager->persist($model);
            $this->addReference($data['reference'], $model);
        }

        $manager->flush();
    }

    public function getDependencies(): iterable
    {
        return [
            BrandFixture::class
        ];
    }

    private function getData(): iterable
    {
        return  [
            [
                'name' => 'Cobra',
                'reference' => self::MODEL_1_REFERENCE,
                'brand' => $this->getReference(BrandFixture::BRAND_1_REFERENCE)
            ],
            [
                'name' => 'Aceca',
                'reference' => self::MODEL_2_REFERENCE,
                'brand' => $this->getReference(BrandFixture::BRAND_1_REFERENCE)
            ],
            [
                'name' => 'Spider',
                'reference' => self::MODEL_3_REFERENCE,
                'brand' => $this->getReference(BrandFixture::BRAND_2_REFERENCE)
            ],
            [
                'name' => 'Giulietta',
                'reference' => self::MODEL_4_REFERENCE,
                'brand' => $this->getReference(BrandFixture::BRAND_2_REFERENCE)
            ],
            [
                'name' => 'A6',
                'reference' => self::MODEL_5_REFERENCE,
                'brand' => $this->getReference(BrandFixture::BRAND_4_REFERENCE)
            ],
            [
                'name' => 'A8',
                'reference' => self::MODEL_6_REFERENCE,
                'brand' => $this->getReference(BrandFixture::BRAND_4_REFERENCE)
            ],
            [
                'name' => 'A6 allroad',
                'reference' => self::MODEL_7_REFERENCE,
                'brand' => $this->getReference(BrandFixture::BRAND_4_REFERENCE)
            ],
            [
                'name' => 'Aveo',
                'reference' => self::MODEL_9_REFERENCE,
                'brand' => $this->getReference(BrandFixture::BRAND_8_REFERENCE)
            ],
            [
                'name' => 'Nexia',
                'reference' => self::MODEL_8_REFERENCE,
                'brand' => $this->getReference(BrandFixture::BRAND_10_REFERENCE)
            ],
            [
                'name' => 'Lacetti',
                'reference' => self::MODEL_10_REFERENCE,
                'brand' => $this->getReference(BrandFixture::BRAND_8_REFERENCE)
            ]
        ];
    }
}
