<?php

namespace App\Repository;

use App\Entity\Preke;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;


use Doctrine\ORM\EntityRepository;
/**
 * @method Preke|null find($id, $lockMode = null, $lockVersion = null)
 * @method Preke|null findOneBy(array $criteria, array $orderBy = null)
 * @method Preke[]    findAll()
 * @method Preke[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrekeRepository extends EntityRepository
{

 
    public function findAllOrderedByPrice()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM App:Preke p ORDER BY p.base_price ASC'
            )
            ->getResult();
    }

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
