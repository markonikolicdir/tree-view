<?php

namespace App\Repository;

use App\Entity\TreeEntry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TreeEntry|null find($id, $lockMode = null, $lockVersion = null)
 * @method TreeEntry|null findOneBy(array $criteria, array $orderBy = null)
 * @method TreeEntry[]    findAll()
 * @method TreeEntry[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TreeEntryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TreeEntry::class);
    }

    // /**
    //  * @return TreeEntry[] Returns an array of TreeEntry objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TreeEntry
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
