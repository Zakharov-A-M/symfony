<?php

declare(strict_types=1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\ReleasesAuto;

class ReleasesAutoFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        foreach ($this->getData() as $data) {
            $releaseAuto = new ReleasesAuto();
            $releaseAuto->setName($data['name']);
            $releaseAuto->setImage($data['image']);
            $releaseAuto->setYearStart($data['yearStart']);
            $releaseAuto->setYearStop($data['yearStop']);
            $releaseAuto->setModel($data['model']);
            
            $manager->persist($releaseAuto);
        }

        $manager->flush();
    }

    public function getDependencies(): iterable
    {
        return [
            BrandFixture::class,
            ModelFixture::class
        ];
    }

    private function getData(): iterable
    {
        return  [
            [
                'name' => 'MK V',
                'image' => 'MK V Test',
                'yearStart' => 2000,
                'yearStop' => 2007,
                'model' => $this->getReference(ModelFixture::MODEL_1_REFERENCE)
            ],
            [
                'name' => '',
                'image' => 'Test',
                'yearStart' => 2001,
                'yearStop' => 2006,
                'model' => $this->getReference(ModelFixture::MODEL_1_REFERENCE)
            ],
            [
                'name' => 'MK VI',
                'image' => 'MK VI Test',
                'yearStart' => 2002,
                'yearStop' => null,
                'model' => $this->getReference(ModelFixture::MODEL_1_REFERENCE)
            ],
            [
                'name' => 'I',
                'image' => 'I Test',
                'yearStart' => 2005,
                'yearStop' => 2010,
                'model' => $this->getReference(ModelFixture::MODEL_5_REFERENCE)
            ],
            [
                'name' => 'II',
                'image' => 'II Test',
                'yearStart' => 2006,
                'yearStop' => 2012,
                'model' => $this->getReference(ModelFixture::MODEL_5_REFERENCE)
            ],
            [
                'name' => 'III (B6) Рестайлинг',
                'image' => 'III (B6) Рестайлинг Test',
                'yearStart' => 2010,
                'yearStop' => null,
                'model' => $this->getReference(ModelFixture::MODEL_5_REFERENCE)
            ],
            [
                'name' => 'III (C6) Рестайлинг',
                'image' => 'III (C6) Рестайлинг Test',
                'yearStart' => 2013,
                'yearStop' => null,
                'model' => $this->getReference(ModelFixture::MODEL_5_REFERENCE)
            ],
            [
                'name' => 'I',
                'image' => 'I Test',
                'yearStart' => 1995,
                'yearStop' => 2003,
                'model' => $this->getReference(ModelFixture::MODEL_8_REFERENCE)
            ],
            [
                'name' => 'I Рестайлинг',
                'image' => 'I Рестайлинг Test',
                'yearStart' => 2011,
                'yearStop' => 2016,
                'model' => $this->getReference(ModelFixture::MODEL_8_REFERENCE)
            ],
            [
                'name' => '',
                'image' => 'I Test Test',
                'yearStart' => 2006,
                'yearStop' => 2010,
                'model' => $this->getReference(ModelFixture::MODEL_10_REFERENCE)
            ]
        ];
    }
}
