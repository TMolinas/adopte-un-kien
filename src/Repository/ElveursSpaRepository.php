<?php

namespace App\Repository;

use App\Entity\ElveursSpa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ElveursSpa|null find($id, $lockMode = null, $lockVersion = null)
 * @method ElveursSpa|null findOneBy(array $criteria, array $orderBy = null)
 * @method ElveursSpa[]    findAll()
 * @method ElveursSpa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ElveursSpaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ElveursSpa::class);
    }

    // /**
    //  * @return ElveursSpa[] Returns an array of ElveursSpa objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ElveursSpa
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
