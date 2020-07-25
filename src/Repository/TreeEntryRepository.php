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

    /**
     * @return array|null
     */
    public function fetchAllData(): ?array
    {
        $query = $this->createQueryBuilder('t')
            ->leftJoin('t.parent', 't2')
            ->leftJoin('t.lang', 'l')
            ->orderBy('l.name', 'ASC')
            ->select('l.name', 'l.lang', 't.id AS entry_id', 't2.id AS parent_entry_id')
            ->getQuery();

//        echo $query->getSQL();
//        die;

        return $query->getResult();
    }

    /**
     * @param null $id
     * @return array|null
     */
    public function fetchLevelData($id = null): ?array
    {
        $query = $this->createQueryBuilder('t')
            ->leftJoin('t.parent', 't2')
            ->leftJoin('t.lang', 'l')
            ->orderBy('l.name', 'ASC')
            ->select('l.name', 'l.lang', 't.id AS entry_id', 't2.id AS parent_entry_id');

        if(is_null($id)){
            $query->where($query->expr()->isNull('t2.id'));
        }else{
            $query->andWhere('t2.id = :id')
                ->setParameter('id', $id);
        }

        return $query->getQuery()
            ->getResult();
    }


    public function countChildren($id): ?int
    {
        $query = $this->createQueryBuilder('t')
            ->leftJoin('t.parent', 't2')
            ->leftJoin('t.lang', 'l')
            ->select('COUNT(t.id)')
            ->andWhere('t2.id = :id')
            ->setParameter('id', $id);;

        return $query->getQuery()
            ->getSingleScalarResult();
    }
}
