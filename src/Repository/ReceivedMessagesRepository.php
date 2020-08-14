<?php

namespace App\Repository;

use App\Entity\ReceivedMessages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ReceivedMessages|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReceivedMessages|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReceivedMessages[]    findAll()
 * @method ReceivedMessages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReceivedMessagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReceivedMessages::class);
    }

    // /**
    //  * @return ReceivedMessages[] Returns an array of ReceivedMessages objects
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
    public function findOneBySomeField($value): ?ReceivedMessages
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
