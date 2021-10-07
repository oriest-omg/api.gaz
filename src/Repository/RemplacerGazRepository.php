<?php

namespace App\Repository;

use App\Entity\RemplacerGaz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RemplacerGaz|null find($id, $lockMode = null, $lockVersion = null)
 * @method RemplacerGaz|null findOneBy(array $criteria, array $orderBy = null)
 * @method RemplacerGaz[]    findAll()
 * @method RemplacerGaz[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RemplacerGazRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RemplacerGaz::class);
    }

    // /**
    //  * @return RemplacerGaz[] Returns an array of RemplacerGaz objects
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
    public function findOneBySomeField($value): ?RemplacerGaz
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
