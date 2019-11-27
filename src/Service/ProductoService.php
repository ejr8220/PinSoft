<?php

namespace App\Service;

use App\Entity\Producto;
use Doctrine\ORM\EntityManagerInterface;

use Exception;
use PhpParser\Node\Stmt\TryCatch;

class ProductoService
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
     * mainProducto
     * Función encargada de setear los entities manager de los esquemas de base de datos
     *
     * @author Edgar Pin Villavicencio <ejr8220@gmail.com>
     * @version 1.0 06-11-2019
     * 
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $objContainer - objeto contenedor
     *
     */

    public function mainProducto($arrayParametros)
    {
        try
        {
            if ($this->validateRequest($arrayParametros))
            {
                var_dump("entro al service");
                switch ($arrayParametros['action']) {
                    case 'create':
                        $strRespuesta = $this->createProducto($arrayParametros);
                        break;
                    case 'read':
                        var_dump("entro al case");
                        $strRespuesta = $this->readProducto($arrayParametros);
                        
                        break;
                    case 'update':
                        $strRespuesta = $this->updateProducto($arrayParametros);
                        break;
                    case 'delete':
                        $strRespuesta = $this->deleteProducto($arrayParametros);
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

    public function createProducto($arrayParametros)
    {
        try
        {
            /*$entityProducto = $this->emManager->getRepository(Producto::class)->findOneBy(array("nombreProducto" => $arrayParametros["nombreProducto"]));
            
            if ($entityProducto)
            {
               throw new Exception("Producto ya ha sido ingresado", 206);
            }*/
            var_dump("si entra ");
            $entityProducto = new Producto();
            
            $entityProducto->setFeCreacion($arrayParametros['feCreacion']);
            $entityProducto->setUsuarioCreacion($arrayParametros['usuarioCreacion']);
            $entityProducto->setFeModifica($arrayParametros['feModifica']);
            $entityProducto->setUsuarioModifica($arrayParametros['usuarioModifica']);
            $entityProducto->setCodigo($arrayParametros['codigo']);
            $entityProducto->setCodigoBarra($arrayParametros['codigoBarra']);
            $entityProducto->setNombreProducto($arrayParametros['nombreProducto']);
            $entityProducto->setFeIngreso($arrayParametros['feIngreso']);
            $entityProducto->setLineaId($arrayParametros['lineaId']);
            $entityProducto->setGrupoId($arrayParametros['grupoId']);
            $entityProducto->setSubgrupoId($arrayParametros['subgrupoId']);
            $entityProducto->setTipoProductoId($arrayParametros['tipoProductoId']);
            $entityProducto->setEstado($arrayParametros['estado']);
            $entityProducto->setBdEstado($arrayParametros['bdEstado']);
            $entityProducto->setIpCreacion($arrayParametros['ipCreacion']);
            $entityProducto->setIpModifica($arrayParametros['ipModifica']);
        

            $this->emManager->persist($entityProducto);
            $this->emManager->flush();
        }
        catch (Exception $ex)
        {
            var_dump($ex->getMessage());
            throw $ex;
        }
        return "Producto Creado de manera exitosa!!!";
    }

    public function readProducto($arrayParametros)
    {   
        try {
            var_dump("entro al read"); 
            
            $arrayProducto = array();
            $entityProductos = $this->emManager->getRepository(Producto::class)->getProductos($arrayParametros);

            foreach ($entityProductos as $entityProducto) {
                $arrayProducto[] = array(   "id"           => $entityProducto->getId(),
                                        "feCreacion"       => $entityProducto->getFeCreacion(),
                                        "usuarioCreacion"  => $entityProducto->getUsuarioCreacion(),
                                        "feModifica"       => $entityProducto->getFeModifica(),
                                        "usuarioModifica"  => $entityProducto->getUsuarioModifica(),  
                                        "codigo"           => $entityProducto->getCodigo(),
                                        "codigoBarra"      => $entityProducto->getCodigoBarra(),
                                        "nombreProducto"   => $entityProducto->getNombreProducto(),
                                        "feIngreso"        => $entityProducto->getFeIngreso(),
                                        "lineaId"          => $entityProducto->getLineaId(),
                                        "grupoId"          => $entityProducto->getGrupoId(),
                                        "subgrupoId"       => $entityProducto->getSubgrupoId(),
                                        "tipoProductoId"   => $entityProducto->getTipoProductoId(),
                                        "estado"           => $entityProducto->getEstado(),
                                        "bdEstado"         => $entityProducto->getBdEstado(),
                                        "ipCreacion"       => $entityProducto->getIpCreacion(),
                                        "ipModifica"       => $entityProducto->getIpModifica());
                                                                    
            }


            return $arrayProducto;
        } 
        catch (Exception $ex) 
        {
            var_dump("error " . $ex->getMessage());
            throw $ex; 
        }
        return $arrayProducto;
    }

    public function updateProducto($arrayParametros)
    {
        try
        {
            var_dump("entro al update");
            $entityProducto = $this->emManager->getRepository(Producto::class)->find($arrayParametros["id"]);
            
            if (!$entityProducto)
            {
               throw new Exception("Producto no ha sido ingresado", 206);
            }
            //$entityProducto = new Producto();
          
            $entityProducto->setFeCreacion($arrayParametros['feCreacion']);
            $entityProducto->setUsuarioCreacion($arrayParametros['usuarioCreacion']);
            $entityProducto->setFeModifica($arrayParametros['feModifica']);
            $entityProducto->setUsuarioModifica($arrayParametros['usuarioModifica']);
            $entityProducto->setCodigo($arrayParametros['codigo']);
            $entityProducto->setCodigoBarra($arrayParametros['codigoBarra']);
            $entityProducto->setNombreProducto($arrayParametros['nombreProducto']);
            $entityProducto->setFeIngreso($arrayParametros['feIngreso']);
            $entityProducto->setLineaId($arrayParametros['lineaId']);
            $entityProducto->setGrupoId($arrayParametros['grupoId']);
            $entityProducto->setSubgrupoId($arrayParametros['subgrupoId']);
            $entityProducto->setTipoProductoId($arrayParametros['tipoProductoId']);
            $entityProducto->setEstado($arrayParametros['estado']);
            $entityProducto->setBdEstado($arrayParametros['bdEstado']);
            $entityProducto->setIpCreacion($arrayParametros['ipCreacion']);
            $entityProducto->setIpModifica($arrayParametros['ipModifica']);

            $this->emManager->persist($entityProducto);
            $this->emManager->flush();


        }
        catch (Exception $ex)
        {
            throw $ex;
        }
        return "Producto Modificado de manera exitosa!!!";
    }
    
    public function deleteProducto($arrayParametros)
    {
        try
        {
            $entityProducto = $this->emManager->getRepository(Producto::class)->find($arrayParametros["id"]);
            
            /*if (!$entityProducto)
            {
               throw new Exception("Producto no ha sido ingresado", 206);
            }*/
            $entityProducto->setEstado("Eliminado");
            $this->emManager->persist($entityProducto);
            $this->emManager->flush();
        }
        catch (Exception $ex)
        {
            throw $ex;
        }
        return "Producto Eliminado de manera exitosa!!!";
    }
}