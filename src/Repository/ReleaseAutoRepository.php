<?php

namespace App\Repository;

use App\Entity\Model;
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

    /**
     * @param int $yearStart
     *
     * @return mixed
     */
    public function getReleaseAutoFromDate(int $yearStart): array
    {
        return $this->createQueryBuilder('r')
            ->where('r.year_start >= :year_start')
            ->orderBy('r.id', 'ASC')
            ->setParameter('year_start', $yearStart)
            ->innerJoin(Model::class, 'm')
            ->andWhere('r.model = m.id')
            ->getQuery()
            ->getResult();
    }

}
