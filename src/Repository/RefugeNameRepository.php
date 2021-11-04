<?php

namespace App\Repository;

use App\Entity\RefugeName;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RefugeName|null find($id, $lockMode = null, $lockVersion = null)
 * @method RefugeName|null findOneBy(array $criteria, array $orderBy = null)
 * @method RefugeName[]    findAll()
 * @method RefugeName[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RefugeNameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RefugeName::class);
    }

    // /**
    //  * @return RefugeName[] Returns an array of RefugeName objects
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
    public function findOneBySomeField($value): ?RefugeName
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
