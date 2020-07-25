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
        return $this->createQueryBuilder('t')
            ->leftJoin('t.parent', 't2')
            ->leftJoin('t.lang', 'l')
            ->orderBy('l.name', 'ASC')
            ->select('l.name', 'l.lang', 't.id AS entry_id', 't2.id AS parent_entry_id')
            ->getQuery()
            ->getResult();
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

//        echo $query->getQuery()->getSQL();

//        echo $query->getParameters();
//        die;

        return $query->getQuery()
            ->getResult();

//        $query=$this->createQueryBuilder('t')
//            ->leftJoin('t.parent', 't2')
//            ->leftJoin('t.lang', 'l')
//            ->orderBy('l.name', 'ASC')
//            ->select('l.name', 'l.lang', 't.id AS entry_id', 't2.id AS parent_entry_id')
//            ->andWhere('t2.id = :id')
//            ->setParameter('id', $id)
//            ->getQuery();
//        echo $query->getSQL();
//
//        die;
    }


    public function countChildren($id): ?int
    {
//        $sql = "SELECT COUNT(*) AS cnt FROM tree_entry_lang tel
//                LEFT JOIN tree_entry te ON tel.entry_id = te.entry_id
//                WHERE parent_entry_id = :id";
//        $statement = $this->pdo->prepare($sql);
//        $statement->execute(array('id' => $id));
//        $shipArray = $statement->fetch(\PDO::FETCH_ASSOC);
//
//        if (!$shipArray) {
//            return 0;
//        }
//
//        return $shipArray['cnt'];


        $query = $this->createQueryBuilder('t')
            ->leftJoin('t.lang', 'l')
            ->select('COUNT(t.id)')
            ->andWhere('t.id = :id')
            ->setParameter('id', $id);;


//            echo $id . '<br>';
//
//        echo $query->getQuery()->getSQL();

//        echo $query->getParameters();
//        die;

        return $query->getQuery()
            ->getSingleScalarResult();

//        var_dump($cnt);
//        die;

//        return !is_null($cnt['cnt']) ? $cnt['cnt'] : 0;
    }
}
