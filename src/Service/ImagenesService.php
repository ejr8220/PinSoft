<?php

namespace App\Service;

use App\Entity\Imagenes;
use Doctrine\ORM\EntityManagerInterface;

use Exception;
use PhpParser\Node\Stmt\TryCatch;

class ImagenesService
{

    private $emManager;

    /**
     * constructor
     * Función encargada de setear los entities manager de los esquemas de base de datos
     *
     * @author 
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
     * mainImagenes
     * Función encargada de setear los entities manager de los esquemas de base de datos
     *
     * @author 
     * @version 1.0 06-11-2019
     * 
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $objContainer - objeto contenedor
     *
     */

    public function mainImagenes($arrayParametros)
    {
        try
        {
            if ($this->validateRequest($arrayParametros))
            {
                switch ($arrayParametros['action']) {
                    case 'create':
                        $strRespuesta = $this->createImagenes($arrayParametros);
                        break;
                    case 'read':
                        $strRespuesta = $this->readImagenes($arrayParametros);
                        break;
                    case 'update':
                        $strRespuesta = $this->updateImagenes($arrayParametros);
                        break;
                    case 'delete':
                        $strRespuesta = $this->deleteImagenes($arrayParametros);
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

    public function createImagenes($arrayParametros)
    {
        try
        {
           /* $entityImagenes = $this->emManager->getRepository(Imagenes::class)->find($arrayParametros["id"]);
            
            if ($entityImagenes)
            {
               throw new Exception("Imagenes ya ha sido ingresado", 206);
            }*/
            $entityImagenes = new Imagenes();
            $entityImagenes->setProductoId($arrayParametros['productoId']);
            $entityImagenes->setRuta($arrayParametros['ruta']);
            $entityImagenes->setPrincipal($arrayParametros['principal']);
            $entityImagenes->setEstado($arrayParametros['estado']);
            $entityImagenes->setUsuarioCreacion($arrayParametros['usuarioCreacion']);
            $entityImagenes->setipCreacion($arrayParametros['ipCreacion']);
            $entityImagenes->setUsuarioModifica($arrayParametros['usuarioModifica']);
            $entityImagenes->setipModifica($arrayParametros['ipModifica']);
            
            $this->emManager->persist($entityImagenes);
            $this->emManager->flush();
        }
        catch (Exception $ex)
        {
            throw $ex;
            
        }
        return "Imagenes Creado de manera exitosa!!!";
    }

    public function readImagenes($arrayParametros)
    {   
        try {
            //$entityImagenes = $this->emManager->getRepository(Imagenes::class)->findAll();
            $arrayImagenes = array();

            $entityImagenes = $this->emManager->getRepository(Imagenes::class)->getImagenes($arrayParametros);
            foreach ($entityImagenes as $entityImagenes) {
                $arrayImagenes[] = array("id_imagen"         => $entityImagenes->getId(),
                                     "productoId"     => $entityImagenes->getProductoId(),
                                     "ruta"     => $entityImagenes->getRuta(),
                                     "principal"     => $entityImagenes->getPrincipal(),
                                     "estado"     => $entityImagenes->getEstado(),
                                     "feCreacion"       => $entityImagenes->getFeCreacion(),
                                     "usuarioCreacion"       => $entityImagenes->getUsuarioCreacion(),
                                     "ipCreacion"=>$entityImagenes->getipCreacion(),
                                     "feModifica" => $entityImagenes->getFeModifica(),
                                     "usuarioModifica" => $entityImagenes->getUsuarioModifica(),
                                     "ipModifica"=>$entityImagenes->getipModifica());
            }
        } 
        catch (Exception $ex) 
        {
            throw $ex;
        }
        return $arrayImagenes;
    }

    public function updateImagenes($arrayParametros)
    {
        try
        {
            $entityImagenes = $this->emManager->getRepository(Imagenes::class)->find($arrayParametros["id"]);
            
            if (!$entityImagenes)
            {
               throw new Exception("Imagenes no ha sido ingresado", 206);
            }
            //$entityImagenes = new Imagenes();
            $entityImagenes->setProductoId($arrayParametros['productoId']);
            $entityImagenes->setRuta($arrayParametros['ruta']);
            $entityImagenes->setPrincipal($arrayParametros['principal']);
            $entityImagenes->setEstado($arrayParametros['estado']);
            $entityImagenes->setUsuarioCreacion($arrayParametros['usuarioCreacion']);
            $entityImagenes->setipCreacion($arrayParametros['ipCreacion']);
            $entityImagenes->setUsuarioModifica($arrayParametros['usuarioModifica']);
            $entityImagenes->setipModifica($arrayParametros['ipModifica']);
            $this->emManager->persist($entityImagenes);
            $this->emManager->flush();


        }
        catch (Exception $ex)
        {
            throw $ex;
        }
        return "Imagenes Modificado de manera exitosa!!!";
    }
    
    public function deleteImagenes($arrayParametros)
    {
        try
        {
            $entityImagenes = $this->emManager->getRepository(Imagenes::class)->find($arrayParametros["id"]);
            
            /*if (!$entityImagenes)
            {
               throw new Exception("Imagenes no ha sido ingresado", 206);
            }*/
            $entityImagenes->setEstado("Eliminado");
            $this->emManager->persist($entityImagenes);
            $this->emManager->flush();
        }
        catch (Exception $ex)
        {
            throw $ex;
        }
        return array("messageUser" => "Imagenes Eliminado de manera exitosa!!!");
    }
}