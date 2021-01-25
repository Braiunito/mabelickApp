<?php

namespace App\Repository;

use App\Entity\Mercaderia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Mercaderia|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mercaderia|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mercaderia[]    findAll()
 * @method Mercaderia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MercaderiaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mercaderia::class);
    }

    // /**
    //  * @return Mercaderia[] Returns an array of Mercaderia objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Mercaderia
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
