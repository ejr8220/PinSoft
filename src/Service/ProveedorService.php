<?php

namespace App\Service;

use App\Entity\Proveedor;
use Doctrine\ORM\EntityManagerInterface;

use Exception;
use PhpParser\Node\Stmt\TryCatch;

class ProveedorService
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
     * mainProveedor
     * Función encargada de setear los entities manager de los esquemas de base de datos
     *
     * @author Edgar Pin Villavicencio <ejr8220@gmail.com>
     * @version 1.0 06-11-2019
     * 
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $objContainer - objeto contenedor
     *
     */

    public function mainProveedor($arrayParametros)
    {
        
        try
        {   
            if ($this->validateRequest($arrayParametros))
            {
                var_dump("entra al if");
                switch ($arrayParametros['action']) {
                    case 'create':
                        $strRespuesta = $this->createProveedor($arrayParametros);
                        break;
                    case 'read':
                        
                        $strRespuesta = $this->readProveedor($arrayParametros);
                        break;
                    case 'update':
                        $strRespuesta = $this->updateProveedor($arrayParametros);
                        break;
                    case 'delete':
                        $strRespuesta = $this->deleteProveedor($arrayParametros);
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

    public function createProveedor($arrayParametros)
    {
        try
        {
            var_dump("entro");
            $entityProveedor = $this->emManager->getRepository(Proveedor::class)->findOneBy(array("ruc" => $arrayParametros["ruc"]));
            
            if ($entityProveedor)
            {
               throw new Exception("Proveedor ya ha sido ingresado", 206);
            }
            $entityProveedor = new Proveedor();
            $entityProveedor->setRuc($arrayParametros['ruc']);
            $entityProveedor->setNombreEmpresa($arrayParametros['nombreEmpresa']);
            $entityProveedor->setDireccion($arrayParametros['direccion']);
            $entityProveedor->setCodigoPostal($arrayParametros['codigoPostal']);
            $entityProveedor->setEmail($arrayParametros['email']);
            $entityProveedor->setTelefono($arrayParametros['telefono']);
            $entityProveedor->setLocalidad($arrayParametros['localidad']);
            $this->emManager->persist($entityProveedor);
            $this->emManager->flush();
        }
        catch (Exception $ex)
        {
            throw $ex;
        }
        return "Proveedor Creado de manera exitosa!!!";
    }

    public function readProveedor($arrayParametros)
    {   
        try {
            var_dump("si");
            //$entityProveedores = $this->emManager->getRepository(Proveedor::class)->findAll();
            $arrayProveedor = array();

            $entityProveedors = $this->emManager->getRepository(Proveedor::class)->getProveedors($arrayParametros);
            foreach ($entityProveedors as $entityProveedor) {
                
                $arrayProveedor[] = array("id"                  => $entityProveedor->getId(),
                                     "ruc"                      => $entityProveedor->getRuc(),
                                     "nombreEmpresa"            => $entityProveedor->getNombreEmpresa(),
                                     "direccion"                => $entityProveedor->getDireccion(),
                                     "codigoPostal"             => $entityProveedor->getCodigoPostal(),
                                     "email"                    => $entityProveedor->getEmail(),
                                     "telefono"                 => $entityProveedor->getTelefono(),
                                     "localidad"                => $entityProveedor->getLocalidad()
                                    );
            }
        } 
        catch (Exception $ex) 
        {
            throw $ex;
        }
        return $arrayProveedor;
    }

    public function updateProveedor($arrayParametros)
    {
        try
        {
            
            $entityProveedor = $this->emManager->getRepository(Proveedor::class)->find($arrayParametros["id"]);
            
            if (!$entityProveedor)
            {
               throw new Exception("Proveedor no ha sido ingresado", 206);
            }
            //$entityProveedor = new Proveedor();
            $entityProveedor->setRuc($arrayParametros['ruc']);
            $entityProveedor->setNombreEmpresa($arrayParametros['nombreEmpresa']);
            $entityProveedor->setDireccion($arrayParametros['direccion']);
            $entityProveedor->setCodigoPostal($arrayParametros['codigoPostal']);
            $entityProveedor->setEmail($arrayParametros['email']);
            $entityProveedor->setTelefono($arrayParametros['telefono']);
            $entityProveedor->setLocalidad($arrayParametros['localidad']);
            $this->emManager->persist($entityProveedor);
            $this->emManager->flush();


        }
        catch (Exception $ex)
        {
            throw $ex;
        }
        return "Proveedor Modificado de manera exitosa!!!";
    }
    
    public function deleteProveedor($arrayParametros)
    {
        try
        {
            var_dump("entro_al dlete");
            $entityProveedor = $this->emManager->getRepository(Proveedor::class)->find($arrayParametros["id"]);
            var_dump("pasa");
            if (!$entityProveedor)
            {
               throw new Exception("Proveedor no ha sido ingresado", 206);
            }
            $entityProveedor->setEstado("Eliminado");
            $this->emManager->persist($entityProveedor);
            $this->emManager->flush();
            var_dump("sale");
        }
        catch (Exception $ex)
        {
            throw $ex;
        }
        return array("messageUser" => "Proveedor Eliminado de manera exitosa!!!");
    }
}