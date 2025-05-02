<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Veiculo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $user->assignPermission('admin');

        $this->call([
            CategoriaSeeder::class,
            VeiculoSeeder::class,
        ]);

        // Categoria::factory()->count(3)->create();
        // Veiculo::factory()->count(3)->create();
        
    }
}
