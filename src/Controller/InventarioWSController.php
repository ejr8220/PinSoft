<?php

namespace App\Controller;

use App\Entity\Componentes;
use App\Entity\Producto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Service\ComponentesService;
use App\Service\ProductoService;


   /**
    * @Rest\RouteResource(
    *     "inventario",
    *     pluralize=false
    * )
    */
class InventarioWSController extends FOSRestController implements ClassResourceInterface

{
    private $ComponentesService;
    private $ProductoService;
    public function __construct(ComponentesService $serviceComponentes, ProductoService $serviceProducto)
    {
        
        $this->ComponentesService = $serviceComponentes;
        $this->ProductoService = $serviceProducto;
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
                case 'Componentes':
                    
                    $arrayRespuesta = $this->ComponentesService->mainComponentes($arrayRequest['data']);
                    $arrayResponse['statusCode'] = 200;
                    $arrayResponse['message']    = "OK";
                    $arrayResponse["data"]       = $arrayRespuesta;
                    
    
                    break;
               case 'Producto':
                    
                    $arrayRespuesta = $this->ProductoService->mainProducto($arrayRequest['data']);
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