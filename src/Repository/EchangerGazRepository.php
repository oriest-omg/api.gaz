<?php

namespace App\Repository;

use App\Entity\EchangerGaz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EchangerGaz|null find($id, $lockMode = null, $lockVersion = null)
 * @method EchangerGaz|null findOneBy(array $criteria, array $orderBy = null)
 * @method EchangerGaz[]    findAll()
 * @method EchangerGaz[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EchangerGazRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EchangerGaz::class);
    }

    // /**
    //  * @return EchangerGaz[] Returns an array of EchangerGaz objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EchangerGaz
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
