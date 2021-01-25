<?php

namespace App\Repository;

use App\Entity\Composicion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Composicion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Composicion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Composicion[]    findAll()
 * @method Composicion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComposicionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Composicion::class);
    }

    // /**
    //  * @return Composicion[] Returns an array of Composicion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Composicion
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
