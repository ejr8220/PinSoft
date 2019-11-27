<?php

namespace App\Repository;

use App\Entity\Producto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**clasi
 * @method Producto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Producto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Producto[]    findAll()
 * @method Producto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Producto::class);
    }

    // /**
    //  * @return Producto[] Returns an array of Producto objects
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
    public function findOneBySomeField($value): ?Producto
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function getProductos($arrayParametros)
    {
        var_dump("entro al repo");
        try{

        
        $objQuery = $this->_em->createQuery();
        $strQuery  = "SELECT p FROM App\Entity\Producto p";
        $strWhere        = " where 1 = 1";
        if (isset($arrayParametros['id']))
        {
            $strWhere .= " and p.id = :id ";
            $objQuery->setParameter('id', $arrayParametros['id']);
        }
       
        $strQuery .= $strWhere;
        
        /*$objRsm->addScalarResult("ID_PAIS"     , 'id'         , "integer");
        $objRsm->addScalarResult("CODIGO"      , 'codigo'     , "string");
        $objRsm->addScalarResult("ISO2"        , 'iso2'       , "string");
        $objRsm->addScalarResult("ISO3"        , 'iso3'       , "string");
        $objRsm->addScalarResult("NOMBRE_PAIS" , 'nombrePais' , "string");
        */
        $objQuery->setDQL($strQuery);
        //$objNtvQuery = $this->_em->createQuery($strQuery); 
        $objResultado = $objQuery->getResult();
    }
    catch (Exception $ex) 
    {
        var_dump("error " . $ex->getMessage());
        throw $ex; 
    }
        var_dump("salgo del repo");
        return $objResultado;

    }



}