<?php namespace Core\Controladores;

class ErroresControladores
{
    public function getError($error)
    {
        
        $errores = $this->getErrores();
        if(array_key_exists($error, $errores))
        {
            return $errores[$error];
        }
        
    }

    private function getErrores()
    {
        return $error = array(
            "001" => array(
                "Descripcion" => "El nombre de la funcion no existe",
                'Ubicacion' => "Revisa el controlador"
            ),
            "002" => array(
                "Descripcion" => "Error de pruebas",
                'Ubicacion' => "Error de test"
            )
        );
    }
}