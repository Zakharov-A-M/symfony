<?php

namespace App\Repository;

use App\Entity\ReleaseAuto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ReleaseAuto|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReleaseAuto|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReleaseAuto[]    findAll()
 * @method ReleaseAuto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReleaseAutoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ReleaseAuto::class);
    }
    
}
