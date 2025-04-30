<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        Categoria::create(['nome' => 'SUV']);
        Categoria::create(['nome' => 'Hatch']);
        Categoria::create(['nome' => 'Sedan']);
        Categoria::create(['nome' => 'Coupé']);
    }
}
