<?php namespace App\Endpoints;

use Core\Abstracts\EndpointsAbstract;
final class Cliente extends EndpointsAbstract
{
    use \Core\Traits\FindTrait;

    public $modelName = 'App\Database\Models\Cliente';

    public function todosXlsx()
    {
        $todos = $this->index()['_data'];

        dd($todos);
    }
    public function todos()
    {
        return [
            [
                'id' => 1,
                'name' => 'Damian',
                'age' => 28
            ],
            [
                'id' => 2,
                'name' => 'Melisa',
                'age' => 27
            ],
            [
                'id' => 3,
                'name' => 'Ivette',
                'age' => 27
            ]
        ];
    }
}