<?php

namespace App\Service;

use App\Entity\Pais;
use Doctrine\ORM\EntityManagerInterface;

use Exception;
use PhpParser\Node\Stmt\TryCatch;

class PaisService
{

    private $emManager;

    /**
     * constructor
     * Función encargada de setear los entities manager de los esquemas de base de datos
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
     * mainPais
     * Función encargada de setear los entities manager de los esquemas de base de datos
     *
     * @author Edgar Pin Villavicencio <ejr8220@gmail.com>
     * @version 1.0 06-11-2019
     * 
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $objContainer - objeto contenedor
     *
     */

    public function mainPais($arrayParametros)
    {
        try
        {
            if ($this->validateRequest($arrayParametros))
            {
                switch ($arrayParametros['action']) {
                    case 'create':
                        $strRespuesta = $this->createPais($arrayParametros);
                        break;
                    case 'read':
                        $strRespuesta = $this->readPais($arrayParametros);
                        break;
                    case 'update':
                        $strRespuesta = $this->updatePais($arrayParametros);
                        break;
                    case 'delete':
                        $strRespuesta = $this->deletePais($arrayParametros);
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

    public function createPais($arrayParametros)
    {
        try
        {
            $entityPais = $this->emManager->getRepository(Pais::class)->findOneBy(array("nombrePais" => $arrayParametros["nombrePais"]));
            
            if ($entityPais)
            {
               throw new Exception("Pais ya ha sido ingresado", 206);
            }
            $entityPais = new Pais();
            $entityPais->setCodigo($arrayParametros['codigo']);
            $entityPais->setIso2($arrayParametros['iso2']);
            $entityPais->setIso3($arrayParametros['iso3']);
            $entityPais->setNombrePais($arrayParametros['nombrePais']);
            $entityPais->setEstado($arrayParametros['estado']);
            $this->emManager->persist($entityPais);
            $this->emManager->flush();
        }
        catch (Exception $ex)
        {
            throw $ex;
        }
        return array("messageUser" => "Pais Creado de manera exitosa!!!");
    }

    public function readPais($arrayParametros)
    {   
        try {
            //$entityPaises = $this->emManager->getRepository(Pais::class)->findAll();
            $arrayPais = array();

            $entityPaises = $this->emManager->getRepository(Pais::class)->getPaises($arrayParametros);
            foreach ($entityPaises as $entityPais) {
                $arrayPais[] = array("id"         => $entityPais->getId(),
                                     "codigo"     => $entityPais->getCodigo(),
                                     "iso2"       => $entityPais->getISo2(),
                                     "iso3"       => $entityPais->getISo3(),
                                     "nombrePais" => $entityPais->getNombrePais());
            }
        } 
        catch (Exception $ex) 
        {
            throw $ex;
        }
        return $arrayPais;
    }

    public function updatePais($arrayParametros)
    {
        try
        {
            $entityPais = $this->emManager->getRepository(Pais::class)->find($arrayParametros["id"]);
            
            if (!$entityPais)
            {
               throw new Exception("Pais no ha sido ingresado", 206);
            }
            //$entityPais = new Pais();
            $entityPais->setCodigo($arrayParametros['codigo']);
            $entityPais->setIso2($arrayParametros['iso2']);
            $entityPais->setIso3($arrayParametros['iso3']);
            $entityPais->setNombrePais($arrayParametros['nombrePais']);
            $this->emManager->persist($entityPais);
            $this->emManager->flush();


        }
        catch (Exception $ex)
        {
            throw $ex;
        }
        return "Pais Modificado de manera exitosa!!!";
    }
    
    public function deletePais($arrayParametros)
    {
        try
        {
            $entityPais = $this->emManager->getRepository(Pais::class)->find($arrayParametros["id"]);
            
            if (!$entityPais)
            {
               throw new Exception("Pais no ha sido ingresado", 206);
            }
            $entityPais->setEstado("Eliminado");
            $this->emManager->persist($entityPais);
            $this->emManager->flush();
        }
        catch (Exception $ex)
        {
            throw $ex;
        }
        return array("messageUser" => "Pais Eliminado de manera exitosa!!!");
    }
}