<?php

namespace App\Service;

use App\Entity\Precios;
use Doctrine\ORM\EntityManagerInterface;

use Exception;
use PhpParser\Node\Stmt\TryCatch;

class PreciosService
{

    private $emManager;

    /**
     * constructor
     * Función encargada de setear los entities manager de los esquemas de base de datos
     *
     * @author Edgar Pin Villavicencio <ejr8220@gmail.com>
     * @version 1.0 06-11-2019
     * 
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $objContainer - objeto contenedor
     *
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->emManager = $em;
    }

    /**
     * mainPrecios
     * Función encargada de setear los entities manager de los esquemas de base de datos
     *
     * @author Edgar Pin Villavicencio <ejr8220@gmail.com>
     * @version 1.0 06-11-2019
     * 
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $objContainer - objeto contenedor
     *
     */

    public function mainPrecios($arrayParametros)
    {
        try
        {
            if ($this->validateRequest($arrayParametros))
            {
                switch ($arrayParametros['action']) {
                    case 'create':
                        $strRespuesta = $this->createPrecios($arrayParametros);
                        break;
                    case 'read':
                        $strRespuesta = $this->readPrecios($arrayParametros);
                        break;
                    case 'update':
                        $strRespuesta = $this->updatePrecios($arrayParametros);
                        break;
                    case 'delete':
                        $strRespuesta = $this->deletePrecios($arrayParametros);
                }
            }
        }
        catch (Exception $ex)
        {
            throw $ex;
        }
        return $strRespuesta;
    }

    public function validateRequest($arrayParametros)
    {
        try
        {
            if (!$arrayParametros['action'])
            {
                throw new Exception("No se ha definido una acción",206);
            }
    
        }
        catch (Exception $ex)
        {
             throw $ex;
        }
        return true;
    }

    public function createPrecios($arrayParametros)
    {
        try
        {
           /* $entityPrecios = $this->emManager->getRepository(Precios::class)->find($arrayParametros["id"]);
            
            if ($entityPrecios)
            {
               throw new Exception("Precios ya ha sido ingresado", 206);
            }*/
            $entityPrecios = new Precios();
            $entityPrecios->setEstado($arrayParametros['estado']);
            $entityPrecios->setUsuarioCreacion($arrayParametros['usuarioCreacion']);
            $entityPrecios->setipCreacion($arrayParametros['ipCreacion']);
            $entityPrecios->setUsuarioModifica($arrayParametros['usuarioModifica']);
            $entityPrecios->setipModifica($arrayParametros['ipModifica']);
            $entityPrecios->setProductoId($arrayParametros['productoId']);
            $entityPrecios->setTipoId($arrayParametros['tipoId']);
            $entityPrecios->setPrecioId($arrayParametros['precioId']);
            $entityPrecios->setPrecio($arrayParametros['precio']);
            $entityPrecios->setAplicaProm($arrayParametros['aplicaProm']);
            $entityPrecios->setEmpaques($arrayParametros['empaques']);
            $entityPrecios->setRango($arrayParametros['rango']);
            $entityPrecios->setFactor($arrayParametros['factor']);
            
            $this->emManager->persist($entityPrecios);
            $this->emManager->flush();
        }
        catch (Exception $ex)
        {
            throw $ex;
            
        }
        return "Precios Creado de manera exitosa!!!";
    }

    public function readPrecios($arrayParametros)
    {   
        try {
            //$entityPrecios = $this->emManager->getRepository(Precios::class)->findAll();
            $arrayPrecios = array();

            $entityPrecios = $this->emManager->getRepository(Precios::class)->getPrecios($arrayParametros);
            foreach ($entityPrecios as $entityPrecios) {
                $arrayPrecios[] = array("id_precio"         => $entityPrecios->getId(),
                                     "estado"     => $entityPrecios->getEstado(),
                                     "feCreacion"       => $entityPrecios->getFeCreacion(),
                                     "usuarioCreacion"       => $entityPrecios->getUsuarioCreacion(),
                                     "ipCreacion"=>$entityPrecios->getipCreacion(),
                                     "feModifica" => $entityPrecios->getFeModifica(),
                                     "usuarioModifica" => $entityPrecios->getUsuarioModifica(),
                                     "ipModifica"=>$entityPrecios->getipModifica(),
                                     "productoId" => $entityPrecios->getProductoId(),
                                     "tipoId" => $entityPrecios->getTipoId(),
                                     "precioId" => $entityPrecios->getPrecioId(),
                                     "precio" => $entityPrecios->getPrecio(),
                                     "feDesde" => $entityPrecios->getFeDesde(),
                                     "feHasta" => $entityPrecios->getFeHasta(),
                                     "aplicaProm" => $entityPrecios->getAplicaProm(),
                                     "empaques" => $entityPrecios->getEmpaques(),
                                     "rango" => $entityPrecios->getRango(),
                                     "factor" => $entityPrecios->getFactor());
            }
        } 
        catch (Exception $ex) 
        {
            throw $ex;
        }
        return $arrayPrecios;
    }

    public function updatePrecios($arrayParametros)
    {
        try
        {
            $entityPrecios = $this->emManager->getRepository(Precios::class)->find($arrayParametros["id"]);
            
            if (!$entityPrecios)
            {
               throw new Exception("Precios no ha sido ingresado", 206);
            }
            //$entityPrecios = new Precios();
            $entityPrecios->setEstado($arrayParametros['estado']);
            $entityPrecios->setUsuarioCreacion($arrayParametros['usuarioCreacion']);
            $entityPrecios->setipCreacion($arrayParametros['ipCreacion']);
            $entityPrecios->setUsuarioModifica($arrayParametros['usuarioModifica']);
            $entityPrecios->setipModifica($arrayParametros['ipModifica']);
            $entityPrecios->setProductoId($arrayParametros['productoId']);
            $entityPrecios->setTipoId($arrayParametros['tipoId']);
            $entityPrecios->setPrecioId($arrayParametros['precioId']);
            $entityPrecios->setPrecio($arrayParametros['precio']);
            $entityPrecios->setAplicaProm($arrayParametros['aplicaProm']);
            $entityPrecios->setEmpaques($arrayParametros['empaques']);
            $entityPrecios->setRango($arrayParametros['rango']);
            $entityPrecios->setFactor($arrayParametros['factor']);
            $this->emManager->persist($entityPrecios);
            $this->emManager->flush();


        }
        catch (Exception $ex)
        {
            throw $ex;
        }
        return "Precios Modificado de manera exitosa!!!";
    }
    
    public function deletePrecios($arrayParametros)
    {
        try
        {
            $entityPrecios = $this->emManager->getRepository(Precios::class)->find($arrayParametros["id"]);
            
            /*if (!$entityPrecios)
            {
               throw new Exception("Precios no ha sido ingresado", 206);
            }*/
            $entityPrecios->setEstado("Eliminado");
            $this->emManager->persist($entityPrecios);
            $this->emManager->flush();
        }
        catch (Exception $ex)
        {
            throw $ex;
        }
        return array("messageUser" => "Precios Eliminado de manera exitosa!!!");
    }
}