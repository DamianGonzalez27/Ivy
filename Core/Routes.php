<?php namespace Core;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class Routes 
{

   private Request $request;

   private $path;

   private $apiParams;

   public function __construct(Request $request, $apiParams)
   {
      $this->request = $request;

      $this->path = explode("/", $this->request->getPathInfo());

      $this->apiParams = $apiParams;
   }

   public function execute()
   {
      if(empty($this->path[1]))
         return $this->notPathExist();

      if($this->path[1] != 'storage')
         if($this->path[1] != 'docs')
            return $this->notPathExist();

      if($this->path[1] == 'storage')
         return $this->storageResponse();      

      if($this->path[1] == 'docs')
         return $this->docsResponse();

   }

   private function notPathExist()
   {
      return new JsonResponse(['Bad Request'], 400);
   }

   private function docsResponse()
   {
      return new JsonResponse($this->apiParams, 200);
   }
   
   private function storageResponse()
   {
      if(is_null($this->request->query->get('path')))
         return $this->notPathExist();
      if(empty($this->request->query->get('path')))
         return $this->notPathExist();

      $bridge = new \App\StorageBridge($this->request->query->get('path'));

      return $bridge->response();
   }
}