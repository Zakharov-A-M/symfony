<?php

namespace App\Repository;

use App\Entity\FuelForEngine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FuelForEngine|null find($id, $lockMode = null, $lockVersion = null)
 * @method FuelForEngine|null findOneBy(array $criteria, array $orderBy = null)
 * @method FuelForEngine[]    findAll()
 * @method FuelForEngine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FuelForEngineRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FuelForEngine::class);
    }

    // /**
    //  * @return FuelForEngine[] Returns an array of FuelForEngine objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FuelForEngine
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
