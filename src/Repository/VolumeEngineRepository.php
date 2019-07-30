<?php

namespace App\Repository;

use App\Entity\VolumeEngine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method VolumeEngine|null find($id, $lockMode = null, $lockVersion = null)
 * @method VolumeEngine|null findOneBy(array $criteria, array $orderBy = null)
 * @method VolumeEngine[]    findAll()
 * @method VolumeEngine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VolumeEngineRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VolumeEngine::class);
    }

    // /**
    //  * @return VolumeEngine[] Returns an array of VolumeEngine objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VolumeEngine
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
