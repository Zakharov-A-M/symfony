<?php

declare(strict_types=1);

namespace App\Services;

use App\Entity\Brand;
use App\Repository\BrandRepository;

class BrandService implements BrandServiceInterface
{
    /**
     * @var BrandRepository
     */
    private $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function create(array $brand): Brand
    {
        
    }

    /**
     * Update information for brand Id
     *
     * @param int $id
     * @param array $info
     * @return Brand
     * @throws \Exception
     */
    public function update(int $id, array $info): Brand
    {
        $brand = $this->load($id);
        $brand->setName($info['name'])->setIcon($info['icon']);
        return $brand;
    }

    /**
     * Get list brand
     *
     * @param int $offset
     * @param int $limit
     * @param string $searchField
     * @param string $searchKeyword
     * @return iterable
     */
    public function list(int $offset = 0, int $limit = 10, string $searchField = '', string $searchKeyword = ''): iterable
    {
        $criteria = [];
        if ($searchField && $searchKeyword) {
            $criteria = [$searchField => $searchKeyword];  
        }

        $brands = $this->brandRepository->findBy($criteria, ['name' => 'DESC'], $limit, $offset);

        return array_map(
            function (Brand $brand) {
                return $brand->toArray();
            },
            (array) $brands
        );
    }

    /**
     * Remove brand Id
     *
     * @param int $id
     * @throws \Exception
     */
    public function remove(int $id): void
    {
        $brand = $this->brandRepository->find($id);

        if (!$brand instanceof Brand) {
            throw new \Exception('The Brand was not found.');
        }

        $this->brandRepository->remove($brand);
    }

    /**
     * Get brand Id
     *
     * @param int $id
     * @return Brand
     * @throws \Exception
     */
    public function load(int $id): Brand
    {
        $brand = $this->brandRepository->find($id);
    
        if (!$brand instanceof Brand) {
            throw new \Exception('The Brand was not found.');
        }

        return $brand;
    }
}