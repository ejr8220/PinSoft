<?php

namespace App\Controller;

use App\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Service\UsuarioService;


   /**
    * @Rest\RouteResource(
    *     "Seguridad",
    *     pluralize=false
    * )
    */
class SeguridadWSController extends FOSRestController implements ClassResourceInterface

{
    private $UsuarioService;
    public function __construct(UsuarioService $serviceUsuario)
    {
        
        $this->UsuarioService = $serviceUsuario;
    }
    

    public function postAction(Request $objRequest)
    {
    

        $arrayRequest = json_decode($objRequest->getContent(), true);
        $strOp = $arrayRequest['op'];
        $arrayResponse = array();
        try 
        {
            switch ($strOp)
            {
                case 'usuario':
                    $arrayRespuesta = $this->UsuarioService->mainUsuario($arrayRequest['data']);
                    $arrayResponse['statusCode'] = 200;
                    $arrayResponse['message']    = "OK";
                    $arrayResponse["data"]       = $arrayRespuesta;
                    
    
                    break;
                
                default:
                    # code...
                    break;
            }
        } 
        catch (\Exception $ex) {
            //throw $th;
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
