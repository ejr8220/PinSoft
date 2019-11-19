<?php

namespace App\Repository;

use App\Entity\Pais;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMappingBuilder;

/**
 * @method Pais|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pais|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pais[]    findAll()
 * @method Pais[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pais::class);
    }

    public function getPaises($arrayParametros)
    {
        
        $objQuery = $this->_em->createQuery();
        $strQuery  = "SELECT p FROM App\Entity\Pais p";
        $strWhere        = " where p.estado <> 'Eliminado' ";
        if (isset($arrayParametros['id']))
        {
            $strWhere .= " and p.id = :id ";
            $objQuery->setParameter('id', $arrayParametros['id']);
        }
       
        $strQuery .= $strWhere;

        $objQuery->setDQL($strQuery);
        //$objNtvQuery = $this->_em->createQuery($strQuery); 
        $objResultado = $objQuery->getResult();

        return $objResultado;

    }
    // /**
    //  * @return Pais[] Returns an array of Pais objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Pais
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
