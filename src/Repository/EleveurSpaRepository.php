<?php

namespace App\Repository;

use App\Entity\EleveurSpa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EleveurSpa|null find($id, $lockMode = null, $lockVersion = null)
 * @method EleveurSpa|null findOneBy(array $criteria, array $orderBy = null)
 * @method EleveurSpa[]    findAll()
 * @method EleveurSpa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EleveurSpaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EleveurSpa::class);
    }

    // /**
    //  * @return EleveursSpa[] Returns an array of EleveursSpa objects
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
    public function findOneBySomeField($value): ?EleveursSpa
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
