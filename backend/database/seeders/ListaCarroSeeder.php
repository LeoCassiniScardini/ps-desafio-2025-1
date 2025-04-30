<?php

namespace Database\Seeders;

use App\Models\Veiculo;
use Illuminate\Database\Seeder;

class VeiculoSeeder extends Seeder
{
    public function run(): void
    {
        Veiculo::create([
            'nome' => 'Corolla',
            'marca' => 'Toyota',
            'ano' => 2020,
            'imagem' => 'corolla.jpg',
            'categoria_id' => 2,
            'quantidade' => 5
        ]);

        Veiculo::create([
            'nome' => 'Hilux',
            'marca' => 'Toyota',
            'ano' => 2022,
            'imagem' => 'hilux.jpg',
            'categoria_id' => 1,
            'quantidade' => 3
        ]);
    }
}
