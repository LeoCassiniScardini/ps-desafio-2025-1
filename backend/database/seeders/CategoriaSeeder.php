<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        Categoria::create(['veiculo_id' => 1, 'nome' => 'SUV']);
        Categoria::create(['veiculo_id' => 2, 'nome' => 'Hatch']);
        Categoria::create(['veiculo_id' => 3, 'nome' => 'Sedan']);
        Categoria::create(['veiculo_id' => 4, 'nome' => 'Coupé']);
    }
}
