<?php

class init{

  public function start()
  {
    header('Content-Type: application/JSON');
    $method = $_SERVER['REQUEST_METHOD'];

    switch($method)
    {
      case 'POST':

          echo "Comunicacion exitosa";

          break;

       default:

          echo "error";

        break;

        case 'GET':

        echo 'Metodo GET';

        break;
        
    }
  }

}
