<?php

namespace App\Repository;

use App\Entity\Recuit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Recuit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recuit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recuit[]    findAll()
 * @method Recuit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecuitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recuit::class);
    }

    // /**
    //  * @return Recuit[] Returns an array of Recuit objects
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
    public function findOneBySomeField($value): ?Recuit
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
