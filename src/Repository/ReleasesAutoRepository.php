<?php

namespace App\Repository;

use App\Entity\ReleasesAuto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ReleasesAuto|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReleasesAuto|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReleasesAuto[]    findAll()
 * @method ReleasesAuto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReleasesAutoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ReleasesAuto::class);
    }

    // /**
    //  * @return RekeasesAuto[] Returns an array of RekeasesAuto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RekeasesAuto
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
