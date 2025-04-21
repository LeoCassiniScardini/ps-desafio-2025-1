<?php

namespace Database\Seeders;

use App\Models\Veiculo;
use Illuminate\Database\Seeder;

class VeiculoSeeder extends Seeder
{
    public function run(): void
    {
        Veiculo::create(['tipo' => 'Carro']);
        Veiculo::create(['tipo' => 'Moto']);
        Veiculo::create(['tipo' => 'Caminhão']);
    }
}
