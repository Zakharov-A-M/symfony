<?php

namespace App\Services;

use App\ApiResponseDTO\Brand as BrandDTO;
use App\ApiResponseDTO\Model as ModelDTO;
use App\ApiResponseDTO\ReleaseAuto as ReleaseAutoDTO;
use App\Entity\ReleaseAuto;
use App\Entity\Brand;
use App\Entity\Model;
use App\Factory\BrandFactory;
use App\Traits\ValidatorAwareTrait;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Class BrandService
 */
class BrandService
{
    use ValidatorAwareTrait;

    /** @var  EntityManagerInterface */
    private $entityManager;

    /** @var BrandFactory */
    private $factoryBrand;

    /** @var NormalizerInterface */
    private $normalizer;

    public function __construct(
        EntityManagerInterface $entityManager,
        BrandFactory $factoryBrand,
        NormalizerInterface $normalizer
    ) {
        $this->entityManager = $entityManager;
        $this->factoryBrand = $factoryBrand;
        $this->normalizer = $normalizer;
    }

    /**
     * @param int $yearStart
     *
     * @return array
     *
     * @throws ExceptionInterface
     */
    public function getModelRelease(int $yearStart): array
    {
        /** @var ReleaseAuto $release */
        $releases = $this->entityManager->getRepository(ReleaseAuto::class)->getReleaseAutoFromDate($yearStart);

        return  $this->normalizer->normalize($releases, null, ['groups' => 'group3']);
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

    /**
     * @param Brand $brand
     *
     * @return BrandDTO
     */
    public function fetchBrandData(Brand $brand): BrandDTO
    {
        return (new BrandDTO())
            ->setBrand($brand->getName())
            ->setIcon($brand->getIcon())
            ->setModel(
                $this->fetchModelFromBrand($brand)
            );
    }

    /**
     * @param Brand $brand
     *
     * @return array|null
     */
    public function fetchModelFromBrand(Brand $brand): array
    {
        $models = [];
        foreach ($brand->getModels() as $model) {
            $models []= (new ModelDTO())
                ->setName($model->getName())
                ->setReleaseAuto(
                    $this->fetchReleaseAutoFromModel($model)
                );
        }

        return $models;
    }

    /**
     * @param Model $model
     * @return array|null
     */
    public function fetchReleaseAutoFromModel(Model $model): array
    {
        $releases = [];
        /** @var ReleaseAuto $release */
        foreach ($model->getReleases() as $release) {
            $releases []= (new ReleaseAutoDTO())
                ->setName($release->getName())
                ->setImage($release->getImage())
                ->setYearStart($release->getYear())
                ->setYearStop($release->getYearStop());
        }

        return $releases;
    }
}
