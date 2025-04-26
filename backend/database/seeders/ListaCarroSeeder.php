<?php

namespace Database\Seeders;

use App\Models\ListaCarro;
use Illuminate\Database\Seeder;

class ListaCarroSeeder extends Seeder
{
    public function run(): void
    {
        ListaCarro::create([
            'nome' => 'Corolla',
            'marca' => 'Toyota',
            'ano' => 2020,
            'imagem' => 'corolla.jpg',
            'categoria_id' => 2, // Hatch
            'quantidade' => 5
        ]);

        ListaCarro::create([
            'nome' => 'Hilux',
            'marca' => 'Toyota',
            'ano' => 2022,
            'imagem' => 'hilux.jpg',
            'categoria_id' => 1, // SUV
            'quantidade' => 3
        ]);
    }
}
