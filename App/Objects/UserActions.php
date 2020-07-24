<?php namespace App\Objects;

use Core\Actions\ActionsAbstract;

use App\Models\User;
// use Core\Validators\Validators;

class UserActions extends ActionsAbstract
{

    /**
     * @author DamianDev
     * 
     * 
     * Clase de ejemplo de funcionamiento
     */
    
    public function __construct($validator)
    {
        parent::__construct($validator);
    }
    public function Example()
    {
        $usuario = User::create([
            'nombre' => 'Damian',
            'apellidos' => 'Gonzalez'
        ]);

        $response = [
            'message' => 'Usuario creado',
            'user' => [
                'id' => $usuario->id,
                'nombre' => $usuario->nombre,
                'apellidos' => $usuario->apellidos
            ]
        ];
        return $this->run($response);
    }

}