<?php

declare(strict_types=1);

namespace App\Services;

use App\Entity\Brand;

interface BrandServiceInterface
{
    public function create(array $brand): Brand;

    public function update(int $id, array $info): Brand;

    public function load(int $id): Brand;

    public function list(int $offset = 0, int $limit = 10, string $searchField = '', string $searchKeyword = ''): iterable;
    
    public function remove(int $id): void;
}