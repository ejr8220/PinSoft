<?php

namespace App\Controller;

use App\Entity\Precios;
use App\Entity\Imagenes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Service\PreciosService;
use App\Service\ImagenesService;



   /**
    * @Rest\RouteResource(
    *     "General",
    *     pluralize=false
    * )
    */
class GeneralWSController extends FOSRestController implements ClassResourceInterface

{
    private $PreciosService;
    private $ImagenesService;
    public function __construct(PreciosService $servicePrecios, ImagenesService $serviceImagenes)
    {
        
        $this->PreciosService = $servicePrecios;
        $this->ImagenesService = $serviceImagenes;
        
    }
    

    public function postAction(Request $objRequest)
    {
        var_dump("llego");    

        $arrayRequest = json_decode($objRequest->getContent(), true);
        $strOp = $arrayRequest['op'];
        $arrayResponse = array();
        try 
        {
            switch ($strOp)
            {
                case 'precios':
                    var_dump("Entró al case");
                    $arrayRespuesta = $this->PreciosService->mainPrecios($arrayRequest['data']);
                    $arrayResponse['statusCode'] = 200;
                    $arrayResponse['message']    = "OK";
                    $arrayResponse["data"]       = $arrayRespuesta;
                    
    
                    break;
                    case 'imagenes':
                        var_dump("Entró al case");
                        $arrayRespuesta = $this->ImagenesService->mainImagenes($arrayRequest['data']);
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
