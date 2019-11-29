<?php

namespace App\Repository;

use App\Entity\Imagenes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMappingBuilder;

/**
 * @method Imagenes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Imagenes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Imagenes[]    findAll()
 * @method Imagenes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImagenesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Imagenes::class);
    }

    public function getImagenes($arrayParametros)
    {
        
        $objQuery = $this->_em->createQuery();
        $strQuery  = "SELECT p FROM App\Entity\Imagenes p";
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
    //  * @return Imagenes[] Returns an array of Imagenes objects
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
    public function findOneBySomeField($value): ?Imagenes
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
