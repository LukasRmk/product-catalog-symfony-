<?php

namespace App\Repository;

use App\Entity\configuration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;


use Doctrine\ORM\EntityRepository;
/**
 * @method Preke|null find($id, $lockMode = null, $lockVersion = null)
 * @method Preke|null findOneBy(array $criteria, array $orderBy = null)
 * @method Preke[]    findAll()
 * @method Preke[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class configRepository extends EntityRepository
{

    // /**
    //  * @return Preke[] Returns an array of Preke objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Preke
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
