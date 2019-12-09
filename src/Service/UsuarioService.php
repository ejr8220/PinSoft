<?php

namespace App\Service;

use App\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;

use Exception;
use PhpParser\Node\Stmt\TryCatch;

class UsuarioService
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
     * mainUsuario
     * Función encargada de setear los entities manager de los esquemas de base de datos
     *
     * @author Edgar Pin Villavicencio <ejr8220@gmail.com>
     * @version 1.0 06-11-2019
     * 
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $objContainer - objeto contenedor
     *
     */

    public function mainUsuario($arrayParametros)
    {
        try
        {
            if ($this->validateRequest($arrayParametros))
            {
                switch ($arrayParametros['action']) {
                    case 'create':
                        var_dump("ingreso1");
                        $strRespuesta = $this->createUsuario($arrayParametros);
                        break;
                    case 'read':
                        var_dump("ingreso2");
                        $strRespuesta = $this->readUsuario($arrayParametros);
                        break;
                    case 'update':
                        var_dump("ingreso3");
                        $strRespuesta = $this->updateUsuario($arrayParametros);
                        break;
                    case 'delete':
                        var_dump("ingreso4");
                        $strRespuesta = $this->deleteUsuario($arrayParametros);
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

    public function createUsuario($arrayParametros)
    {
        try
        {
            $entityUsuario = $this->emManager->getRepository(Usuario::class)->findOneBy(array("usuario" => $arrayParametros["usuario"]));
            
            if ($entityUsuario)
            {
               throw new Exception("Usuario ya ha sido ingresado", 206);
            }
            $entityUsuario = new Usuario();
            $entityUsuario->setUsuario($arrayParametros['usuario']);
            $entityUsuario->setClave($arrayParametros['clave']);
            $entityUsuario->setEstado($arrayParametros['estado']);
            $this->emManager->persist($entityUsuario);
            $this->emManager->flush();
        }
        catch (Exception $ex)
        {
            var_dump("Error ".$ex->getMessage());
            throw $ex;
        }
        return array("messageUser" => "Usuario Creado de manera exitosa!!!");
    }

    public function readUsuario($arrayParametros)
    {   
        try {
            //$entityUsuarioes = $this->emManager->getRepository(Usuario::class)->findAll();
            $arrayUsuario = array();

            $entityUsuarioes = $this->emManager->getRepository(Usuario::class)->getUsuarioes($arrayParametros);
            foreach ($entityUsuarioes as $entityUsuario) {
                $arrayUsuario[] = array("id"         => $entityUsuario->getId(),
                                     "nombre"     => $entityUsuario->getUsuario(),
                                     "estado"       => $entityUsuario->getEstado());
            }
        } 
        catch (Exception $ex) 
        {
            var_dump("Error ".$ex->getMessage());
            throw $ex;
        }
        return $arrayUsuario;
    }

    public function updateUsuario($arrayParametros)
    {
        try
        {
            $entityUsuario = $this->emManager->getRepository(Usuario::class)->find($arrayParametros["id"]);
            
            if (!$entityUsuario)
            {
               throw new Exception("Usuario no ha sido ingresado", 206);
            }
            //$entityUsuario = new Usuario();
            $entityUsuario->setUsuario($arrayParametros['usuario']);
            $entityUsuario->setClave($arrayParametros['clave']);
            $entityUsuario->setEstado($arrayParametros['estado']);
            $this->emManager->persist($entityUsuario);
            $this->emManager->flush();


        }
        catch (Exception $ex)
        {   
            var_dump("Error ".$ex->getMessage());
            throw $ex;
        }
        return "Usuario Modificado de manera exitosa!!!";
    }
    
    public function deleteUsuario($arrayParametros)
    {
        try
        {
            $entityUsuario = $this->emManager->getRepository(Usuario::class)->find($arrayParametros["id"]);
            
            if (!$entityUsuario)
            {
               throw new Exception("Usuario no ha sido ingresado", 206);
            }
            $entityUsuario->setEstado("Desabilitado");
            $this->emManager->persist($entityUsuario);
            $this->emManager->flush();
        }
        catch (Exception $ex)
        {
            var_dump("Error ".$ex->getMessage());
            throw $ex;
        }
        return array("messageUser" => "Usuario Eliminado de manera exitosa!!!");
    }
}