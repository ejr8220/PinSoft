<?php

namespace App\Controller;

use App\Entity\Proveedor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Service\ProveedorService;


   /**
    * @Rest\RouteResource(
    *     "Inventario",
    *     pluralize=false
    * )
    */
class InventarioWSController extends FOSRestController implements ClassResourceInterface

{
    private $ProveedorService;
    public function __construct(ProveedorService $serviceProveedor)
    {
        
        $this->ProveedorService = $serviceProveedor;
    }
    

    public function postAction(Request $objRequest)
    {
    

        $arrayRequest = json_decode($objRequest->getContent(), true);
        $strOp = $arrayRequest['op'];
        $arrayResponse = array();
        try 
        {
            var_dump("entra al try");
            switch ($strOp)
            {
                case 'proveedor':
                    $arrayRespuesta = $this->ProveedorService->mainProveedor($arrayRequest['data']);
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
