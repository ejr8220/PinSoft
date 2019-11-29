<?php

namespace App\Repository;

use App\Entity\Precios;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMappingBuilder;

/**
 * @method Precios|null find($id, $lockMode = null, $lockVersion = null)
 * @method Precios|null findOneBy(array $criteria, array $orderBy = null)
 * @method Precios[]    findAll()
 * @method Precios[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PreciosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Precios::class);
    }

    public function getPrecios($arrayParametros)
    {
        
        $objQuery = $this->_em->createQuery();
        $strQuery  = "SELECT p FROM App\Entity\Precios p";
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
    //  * @return Precios[] Returns an array of Precios objects
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
    public function findOneBySomeField($value): ?Precios
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
