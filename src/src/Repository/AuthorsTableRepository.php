<?php

namespace App\Repository;

use App\Entity\AuthorsTable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AuthorsTable|null find($id, $lockMode = null, $lockVersion = null)
 * @method AuthorsTable|null findOneBy(array $criteria, array $orderBy = null)
 * @method AuthorsTable[]    findAll()
 * @method AuthorsTable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AuthorsTableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AuthorsTable::class);
    }

    // /**
    //  * @return AuthorsTable[] Returns an array of AuthorsTable objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AuthorsTable
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
