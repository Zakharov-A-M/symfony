<?php

namespace App\Repository;

use App\Entity\SteeringLocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SteeringLocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method SteeringLocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method SteeringLocation[]    findAll()
 * @method SteeringLocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SteeringLocationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SteeringLocation::class);
    }

    // /**
    //  * @return SteeringLocation[] Returns an array of SteeringLocation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SteeringLocation
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
