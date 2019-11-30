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
                var_dump("entri");
                
                switch ($arrayParametros['action']) {
                    case 'create':
                        $strRespuesta = $this->createUsuario($arrayParametros);
                        break;
                    case 'read':
                        
                        $strRespuesta = $this->readUsuario($arrayParametros);
                        break;
                    case 'update':
                        $strRespuesta = $this->updateUsuario($arrayParametros);
                        break;
                    case 'delete':
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
            var_dump("si");
            $entityUsuario = $this->emManager->getRepository(Usuario::class)->findOneBy(array("nombreUsuario" => $arrayParametros["nombreUsuario"]));
            
            if ($entityUsuario)
            {
                
                throw new Exception("Usuario ya ha sido ingresado", 206);
                
            }
            $entityUsuario = new Usuario();
            $entityUsuario->setCedula($arrayParametros['cedula']);
            $entityUsuario->setNombre($arrayParametros['nombre']);
            $entityUsuario->setApellido($arrayParametros['apellido']);
            $entityUsuario->setCorreo($arrayParametros['correo']);
            $entityUsuario->setNombreUsuario($arrayParametros['nombreUsuario']);
            $entityUsuario->setContrasenia($arrayParametros['contrasenia']);
            $this->emManager->persist($entityUsuario);
            $this->emManager->flush();
            
        }
        catch (Exception $ex)
        {
            var_dump("sale");
            throw $ex;
        }
        return "Usuario Creado de manera exitosa!!!";
    }

    public function readUsuario($arrayParametros)
    {   
        try {
            //$entityUsuarioes = $this->emManager->getRepository(Usuario::class)->findAll();
            $arrayUsuario = array();

            $entityUsuarios = $this->emManager->getRepository(Usuario::class)->getUsuarios($arrayParametros);
            foreach ($entityUsuarios as $entityUsuario) {
                
                $arrayUsuario[] = array("id"         => $entityUsuario->getId(),
                                     "cedula"        => $entityUsuario->getCedula(),
                                     "nombre"        => $entityUsuario->getNombre(),
                                     "apellido"      => $entityUsuario->getApellido(),
                                     "correo"        => $entityUsuario->getCorreo(),
                                     "nombreUsuario" => $entityUsuario->getNombreUsuario(),
                                     "contrasenia"   => $entityUsuario->getContrasenia()
                                    );
            }
        } 
        catch (Exception $ex) 
        {
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
            $entityUsuario->setCedula($arrayParametros['cedula']);
            $entityUsuario->setNombre($arrayParametros['nombre']);
            $entityUsuario->setCedula($arrayParametros['apellido']);
            $entityUsuario->setCorreo($arrayParametros['correo']);
            $entityUsuario->setNombreUsuario($arrayParametros['nombreUsuario']);
            $entityUsuario->setContrasenia($arrayParametros['contrasenia']);
            $this->emManager->persist($entityUsuario);
            $this->emManager->flush();


        }
        catch (Exception $ex)
        {
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
            $entityUsuario->setEstado("Eliminado");
            $this->emManager->persist($entityUsuario);
            $this->emManager->flush();
        }
        catch (Exception $ex)
        {
            throw $ex;
        }
        return array("messageUser" => "Usuario Eliminado de manera exitosa!!!");
    }
}