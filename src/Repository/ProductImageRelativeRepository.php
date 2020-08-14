<?php

namespace App\Repository;

use App\Entity\ProductImageRelative;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductImageRelative|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductImageRelative|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductImageRelative[]    findAll()
 * @method ProductImageRelative[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductImageRelativeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductImageRelative::class);
    }

    // /**
    //  * @return ProductImageRelative[] Returns an array of ProductImageRelative objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProductImageRelative
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
