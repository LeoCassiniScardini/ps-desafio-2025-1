<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        Categoria::create(['veiculo_id' => 1, 'categoria' => 'SUV']);
        Categoria::create(['veiculo_id' => 1, 'categoria' => 'Sedan']);
        Categoria::create(['veiculo_id' => 2, 'categoria' => 'Esportiva']);
        Categoria::create(['veiculo_id' => 3, 'categoria' => 'Carga']);
    }
}
