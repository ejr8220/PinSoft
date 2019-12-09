<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Entity\Aplicacion;
use App\Entity\Usuario_Aplicacion;
use App\Entity\Token;
use App\Service\UsuarioService;
use App\Service\AplicacionService;
use App\Service\Usuario_AplicacionService;
use App\Service\TokenService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



   /**
    * @Rest\RouteResource(
    *     "Login",
    *     pluralize=false
    * )
    */
class LoginWSController extends FOSRestController implements ClassResourceInterface

{
    private $usuarioService;
    private $aplicacionService;
    private $usuario_aplicacionService;
    private $tokenService;
    public function __construct(UsuarioService $serviceUsuario, AplicacionService $serviceAplicacion,
                                Usuario_AplicacionService $serviceUsuario_Aplicacion, 
                                TokenService $serviceToken)
    {
        $this->usuarioService = $serviceUsuario;
        $this->usuario_aplicacionService = $serviceUsuario_Aplicacion;
        $this->aplicacionService = $serviceAplicacion;
        $this->tokenService = $serviceToken;
    }
    

    public function postAction(Request $objRequest)
    {
    
        
        var_dump("principal");
        $arrayRequest = json_decode($objRequest->getContent(), true);
        $strOp = $arrayRequest['op'];
        $arrayResponse = array();
        try 
        {
            switch ($strOp)
            {
                case 'usuario':
                    var_dump("usuario");
                    $arrayRespuesta = $this->usuarioService->mainUsuario($arrayRequest['data']);
                    $arrayResponse['statusCode'] = 200;
                    $arrayResponse['message']    = "OK";
                    $arrayResponse["data"]       = $arrayRespuesta;
                    
                    break;

                case 'aplicacion':
                    var_dump("aplicacion");
                    $arrayRespuesta = $this->aplicacionService->mainAplicacion($arrayRequest['data']);
                    $arrayResponse['statusCode'] = 200;
                    $arrayResponse['message']    = "OK";
                    $arrayResponse["data"]       = $arrayRespuesta;
                        
                    break;
                
                case 'usuario_aplicacion':
                    var_dump("apli");
                    $arrayRespuesta = $this->usuario_aplicacionService->mainUsuario_Aplicacion($arrayRequest['data']);
                    $arrayResponse['statusCode'] = 200;
                    $arrayResponse['message']    = "OK";
                    $arrayResponse["data"]       = $arrayRespuesta;
                    
                    break;
                
                case 'token':
                    var_dump("token");
                    $arrayRespuesta = $this->tokenService->mainToken($arrayRequest['data']);
                    $arrayResponse['statusCode'] = 200;
                    $arrayResponse['message']    = "OK";
                    $arrayResponse["data"]       = $arrayRespuesta;
                        
                    break;
                default:
                    # code...
                    break;
            }
        } 
        catch (Exception $ex) {
            //throw new Exception("Error");
            var_dump("Error".$ex->getMessage());
        }


        $response = new Response();
    
        $response->setContent(json_encode($arrayResponse));
        $response->headers->set('Content-Type', 'application/json');
        // Allow all websites
        $response->headers->set('Access-Control-Allow-Origin', '*');
        // Or a predefined website
        //$response->headers->set('Access-Control-Allow-Origin', 'https://jsfiddle.net/');
        // You can set the allowed methods too, if you want    //$response->headers->set('Access-Control-Allow-Methods', 'POST, GET, PUT, DELETE, PATCH, OPTIONS');    
        return $response;        
        
        //return json_decode(
        //    $objRequest->getContent(),
        //    true);
    }
}
