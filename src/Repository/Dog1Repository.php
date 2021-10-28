<?php

namespace App\Repository;

use App\Entity\Dog1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Dog1|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dog1|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dog1[]    findAll()
 * @method Dog1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Dog1Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dog1::class);
    }

    // /**
    //  * @return Dog1[] Returns an array of Dog1 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Dog1
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
