<?php

namespace App\Repository;

use App\Entity\BookTable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BookTable|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookTable|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookTable[]    findAll()
 * @method BookTable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookTableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookTable::class);
    }

    // /**
    //  * @return BookTable[] Returns an array of BookTable objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BookTable
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
