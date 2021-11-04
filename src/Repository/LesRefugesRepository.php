<?php

namespace App\Repository;

use App\Entity\Refuge;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Refuge|null find($id, $lockMode = null, $lockVersion = null)
 * @method Refuge|null findOneBy(array $criteria, array $orderBy = null)
 * @method Refuge[]    findAll()
 * @method Refuge[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LesRefugesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Refuge::class);
    }

    // /**
    //  * @return LesRefuges[] Returns an array of LesRefuges objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LesRefuges
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
