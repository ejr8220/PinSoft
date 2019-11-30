<?php

namespace App\Repository;

use App\Entity\Proveedor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMappingBuilder;

/**
 * @method Proveedor|null find($id, $lockMode = null, $lockVersion = null)
 * @method Proveedor|null findOneBy(array $criteria, array $orderBy = null)
 * @method Proveedor[]    findAll()
 * @method Proveedor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProveedorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Proveedor::class);
    }

    public function getProveedors($arrayParametros)
    {
        var_dump("gettt");
        $objQuery = $this->_em->createQuery();
        $strQuery  = "SELECT p FROM App\Entity\Proveedor p";
        $strWhere        = " where p.estado <> 'Eliminado' ";
        if (isset($arrayParametros['id']))
        {
            var_dump("entra al if");
            $strWhere .= " and p.id = :id ";
            $objQuery->setParameter('id', $arrayParametros['id']);
        }
       
        $strQuery .= $strWhere;
        
        $objQuery->setDQL($strQuery);
        //$objNtvQuery = $this->_em->createQuery($strQuery); 
        $objResultado = $objQuery->getResult();
        
        return $objResultado;

    }
}
