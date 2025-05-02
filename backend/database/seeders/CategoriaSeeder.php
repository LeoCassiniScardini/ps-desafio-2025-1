<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{

    private $categorias = [
        'Carro',
        'Moto',
        'Caminhão',
        'Avião',
        'Barco',
    ];


    public function run(): void
    {
        foreach($this->categorias as $categoria) {
            Categoria::create(['nome' => $categoria]);
        }

    }
}
