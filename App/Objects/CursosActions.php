<?php namespace App\Objects;

use Core\Actions\ActionsAbstract;
// use Core\Validators\Validators;

class CursosActions extends ActionsAbstract
{

    /**
     * @author DamianDev
     * 
     * 
     * Clase manejadora de metodos de endpoint
     */
    public $cursos = [
            'PHP' => [
                'duracion' => '3 hrs',
                'descripcion' => 'Esto es un curso de PHP',
                'costo' => '350 MXN',
                'ubicacion' => 'Ubicacion de imparticion'
            ],
            'Python' => [
                'duracion' => '3 hrs',
                'descripcion' => 'Esto es un curso de Python',
                'costo' => '350 MXN',
                'ubicacion' => 'Ubicacion de imparticion'
            ],
            'Ruby' => [
                'duracion' => '3 hrs',
                'descripcion' => 'Esto es un curso de Ruby',
                'costo' => '350 MXN',
                'ubicacion' => 'Ubicacion de imparticion'
            ],
            'Java' => [
                'duracion' => '3 hrs',
                'descripcion' => 'Esto es un curso de Java',
                'costo' => '350 MXN',
                'ubicacion' => 'Ubicacion de imparticion'
            ]
    ];
    public function __construct($validator)
    {
        parent::__construct($validator);
    }
    public function TodosLosCursos()
    {
        return $this->run($this->cursos);
    }

    public function PHP_Curso()
    {
        return $this->run($this->cursos['PHP']);
    }
    public function Java_Curso()
    {
        
        return $this->run($this->cursos['Java']);
    }
    public function Ruby_Curso()
    {
        
        return $this->run($this->cursos['Ruby']);
    }
    public function Python_Curso()
    {
        return $this->run($this->cursos['Python']);
    }
    public function Comprar_Curso()
    {
        $response = [
            'Message' => 'Gracias por tu compra',
            'Curso' => 'Curso comprado',
        ];
        return $this->run($response);
    }
}