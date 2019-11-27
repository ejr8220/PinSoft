<?php

namespace App\Service;

use App\Entity\Componentes;
use Doctrine\ORM\EntityManagerInterface;

use Exception;
use PhpParser\Node\Stmt\TryCatch;

class ComponentesService
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
     * 
     */


    public function __construct(EntityManagerInterface $em)
    {
        $this->emManager = $em;
    }

    /**
     * mainComponentes
     * Función encargada de setear los entities manager de los esquemas de base de datos
     *
     * @author Edgar Pin Villavicencio <ejr8220@gmail.com>
     * @version 1.0 06-11-2019
     * 
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $objContainer - objeto contenedor
     *
     */

    public function mainComponentes($arrayParametros)
    {
        try
        {
            if ($this->validateRequest($arrayParametros))
            {
                var_dump("entro al service");
                switch ($arrayParametros['action']) {
                    case 'create':
                        $strRespuesta = $this->createComponentes($arrayParametros);
                        break;
                    case 'read':
                        var_dump("entro al case");
                        $strRespuesta = $this->readComponentes($arrayParametros);
                        
                        break;
                    case 'update':
                        $strRespuesta = $this->updateComponentes($arrayParametros);
                        break;
                    case 'delete':
                        $strRespuesta = $this->deleteComponentes($arrayParametros);
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

    public function createComponentes($arrayParametros)
    {
        try
        {
            /*$entityComponentes = $this->emManager->getRepository(Componentes::class)->findOneBy(array("nombreComponentes" => $arrayParametros["nombreComponentes"]));
            
            if ($entityComponentes)
            {
               throw new Exception("Componentes ya ha sido ingresado", 206);
            }*/
            var_dump("si entra ");
            $entityComponentes = new Componentes();
            $entityComponentes->setEstado($arrayParametros['estado']);
           
            $entityComponentes->setFeCreacion($arrayParametros['feCreacion']);
            $entityComponentes->setUsuarioCreacion($arrayParametros['usuarioCreacion']);
            $entityComponentes->setFeModifica($arrayParametros['feModifica']);
            $entityComponentes->setUsuarioModifica($arrayParametros['usuarioModifica']);
            
            $entityComponentes->setProductoId($arrayParametros['productoId']);
            $entityComponentes->setCantidad($arrayParametros['cantidad']);
            $entityComponentes->setCosto($arrayParametros['costo']);
            $entityComponentes->setProveedor($arrayParametros['proveedor']);

            $this->emManager->persist($entityComponentes);
            $this->emManager->flush();
        }
        catch (Exception $ex)
        {
            var_dump($ex->getMessage());
            throw $ex;
        }
        return "Componentes Creado de manera exitosa!!!";
    }

    public function readComponentes($arrayParametros)
    {   
        try {
            var_dump("entro al read"); 
            
            $arrayComponentes = array();
            $entityComponentess = $this->emManager->getRepository(Componentes::class)->getComponentess($arrayParametros);

            foreach ($entityComponentess as $entityComponentes) {
                $arrayComponentes[] = array(   "id"        => $entityComponentes->getId(),
                                        "estado"           => $entityComponentes->getEstado(),
                                        "feCreacion"       => $entityComponentes->getFeCreacion(),
                                        "usuarioCreacion"  => $entityComponentes->getUsuarioCreacion(),
                                        "feModifica"       => $entityComponentes->getFeModifica(),
                                        "usuarioModifica"  => $entityComponentes->getUsuarioModifica(),  
                                        "productoId"       => $entityComponentes->getProductoId(),
                                        "cantidad"         => $entityComponentes->getCantidad(),
                                        "costo"            => $entityComponentes->getCosto(),
                                        "proveedor"        => $entityComponentes->getProveedor());
                                       
            }


            return $arrayComponentes;
        } 
        catch (Exception $ex) 
        {
            var_dump("error " . $ex->getMessage());
            throw $ex; 
        }
        return $arrayComponentes;
    }

    public function updateComponentes($arrayParametros)
    {
        try
        {
            var_dump("entro al update");
            $entityComponentes = $this->emManager->getRepository(Componentes::class)->find($arrayParametros["id"]);
            
            if (!$entityComponentes)
            {
               throw new Exception("Componentes no ha sido ingresado", 206);
            }
            //$entityComponentes = new Componentes();
            $entityComponentes->setEstado($arrayParametros['estado']);
            $entityComponentes->setFeCreacion($arrayParametros['feCreacion']);
            $entityComponentes->setUsuarioCreacion($arrayParametros['usuarioCreacion']);
            $entityComponentes->setFeModifica($arrayParametros['feModifica']);
            $entityComponentes->setUsuarioModifica($arrayParametros['usuarioModifica']);
            $entityComponentes->setProductoId($arrayParametros['productoId']);
            $entityComponentes->setCantidad($arrayParametros['cantidad']);
            $entityComponentes->setCosto($arrayParametros['costo']);
            $entityComponentes->setProveedor($arrayParametros['proveedor']);

            $this->emManager->persist($entityComponentes);
            $this->emManager->flush();


        }
        catch (Exception $ex)
        {
            throw $ex;
        }
        return "Componentes Modificado de manera exitosa!!!";
    }
    
    public function deleteComponentes($arrayParametros)
    {
        try
        {
            $entityComponentes = $this->emManager->getRepository(Componentes::class)->find($arrayParametros["id"]);
            
            /*if (!$entityComponentes)
            {
               throw new Exception("Componentes no ha sido ingresado", 206);
            }*/
            $entityComponentes->setEstado("Eliminado");
            $this->emManager->persist($entityComponentes);
            $this->emManager->flush();
        }
        catch (Exception $ex)
        {
            throw $ex;
        }
        return "Componentes Eliminado de manera exitosa!!!";
    }
}