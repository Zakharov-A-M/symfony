<?php

namespace App\Services;

use App\ApiResponseDTO\Brand as BrandDTO;
use App\Entity\Brand;
use App\Factory\BrandFactory;
use App\Traits\ValidatorAwareTrait;
use Doctrine\ORM\EntityManagerInterface;

class BrandService
{
    use ValidatorAwareTrait;

    /** @var  EntityManagerInterface */
    private $entityManager;

    /** @var BrandFactory */
    private $factoryBrand;

    public function __construct(EntityManagerInterface $entityManager, BrandFactory $factoryBrand)
    {
        $this->entityManager = $entityManager;
        $this->factoryBrand = $factoryBrand;
    }

    /**
     * @param int $page
     * @param int $limit
     * @param string|null $keyword
     */
    public function getListBrand(int $page, int $limit, ?string $keyword)
    {

    }

    /**
     * @param BrandDTO $dto
     */
    public function createBrand(BrandDTO $dto): void
    {
        $this->validate($dto);

        $brand = $this->factoryBrand->createBrand($dto->getBrand(), $dto->getIcon());

        $this->entityManager->persist($brand);
        $this->entityManager->flush();
    }
}
